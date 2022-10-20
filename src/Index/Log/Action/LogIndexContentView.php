<?php

namespace Nemundo\Content\Index\Log\Action;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Content\Action\AbstractActionView;
use Nemundo\Content\Index\Log\Data\Log\LogPaginationReader;
use Nemundo\Content\Index\Log\Data\Log\LogReader;
use Nemundo\Db\Sql\Order\SortOrder;

class LogIndexContentView extends AbstractActionView
{

    public function getContent()
    {

        $table = new AdminTable($this);

        $logReader = new LogReader();
        $logReader->model->loadContent();
        $logReader->model->content->loadContentType();
        $logReader->model->loadUser();
        $logReader->addOrder($logReader->model->id,SortOrder::DESCENDING);

        $logReader->filter->andEqual($logReader->model->contentId,$this->contentId);

        $header=new AdminTableHeader($table);
        /*$header->addText($logReader->model->content->contentType->label);
        $header->addText($logReader->model->content->label);*/
        $header->addText($logReader->model->user->label);
        $header->addText($logReader->model->dateTime->label);

        foreach ($logReader->getData() as $logRow) {

            $tableRow = new AdminTableRow($table);
            /*$tableRow->addText($logRow->content->contentType->contentType);
            $tableRow->addText($logRow->content->subject);*/
            $tableRow->addText($logRow->user->displayName);
            $tableRow->addText($logRow->dateTime->getShortDateTimeLeadingZeroFormat());

        }

        return parent::getContent();

    }

}