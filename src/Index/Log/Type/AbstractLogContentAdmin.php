<?php

namespace Nemundo\Content\Index\Log\Type;

use Nemundo\Admin\ActionSite\IconActionSite;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Content\Index\Log\Data\Log\LogReader;
use Nemundo\Content\Parameter\DataIdParameter;
use Nemundo\Content\View\AbstractContentAdmin;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Paragraph\Paragraph;

class AbstractLogContentAdmin extends AbstractContentAdmin
{

    /**
     * @var IconActionSite
     */
    protected $log;

    protected function loadActionSite()
    {

        parent::loadActionSite();

        $this->log = new IconActionSite($this);
        $this->log->title[LanguageCode::EN] = 'Log';
        $this->log->title[LanguageCode::DE] = 'Log';
        $this->log->actionName = 'log';
        $this->log->iconName = 'info';


        $this->log->onAction = function () {
            $dataId = (new DataIdParameter())->getValue();
            //$this->onEdit($dataId);

            $subtitle = new AdminSubtitle($this);
            $subtitle->content = 'Content Log';


            $p = new Paragraph($this);
            $p->content = 'data id: ' . $dataId;


            $table = new AdminTable($this);

            $logReader = new LogReader();
            $logReader->model->loadContent();
            $logReader->model->content->loadContentType();
            $logReader->model->loadUser();
            $logReader->addOrder($logReader->model->id, SortOrder::DESCENDING);

            $logReader->filter->andEqual($logReader->model->content->dataId, $dataId);

            $header = new AdminTableHeader($table);
            $header->addText($logReader->model->user->label);
            $header->addText($logReader->model->dateTime->label);

            foreach ($logReader->getData() as $logRow) {

                $tableRow = new AdminTableRow($table);
                $tableRow->addText($logRow->user->displayName);
                $tableRow->addText($logRow->dateTime->getShortDateTimeLeadingZeroFormat());

            }

        };


    }


    protected function getLogSite($dataId)
    {

        $site = clone($this->log);
        $site->addParameter(new DataIdParameter($dataId));
        return $site;

    }


}