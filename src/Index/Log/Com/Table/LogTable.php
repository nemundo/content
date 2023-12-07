<?php

namespace Nemundo\Content\Index\Log\Com\Table;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Content\Index\Log\Data\Log\LogReader;
use Nemundo\Content\Index\Log\Reader\Log\LogDataReader;
use Nemundo\Content\Index\Log\Status\DeleteStatus;
use Nemundo\Content\Index\Log\Type\AbstractLogContentType;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\ContentTest\App\Poi\Data\Poi\PoiReader;

class LogTable extends AdminTable
{

    public $contentTypeId;

    public $dataId;

    public function getContent()
    {

        $logReader = new LogDataReader();
        /*$logReader->model->loadContent()->loadStatus();
        $logReader->model->content->loadContentType();
        $logReader->model->loadUser();*/
        //$logReader->addOrder($logReader->model->id, SortOrder::DESCENDING);
        $logReader->addOrder($logReader->model->id);

        //$logReader->filter->andEqual($logReader->model->content->dataId, $this->dataId);
        $logReader->contentTypeId = $this->contentTypeId;
        $logReader->dataId = $this->dataId;

        $header = new AdminTableHeader($this);
        //$header->addText($logReader->model->message->label);
        $header->addText($logReader->model->user->label);
        $header->addText($logReader->model->dateTime->label);
        $header->addText($logReader->model->create->label);
        $header->addText($logReader->model->statusChange->label);
        $header->addText($logReader->model->status->label);
        $header->addText($logReader->model->hasLogData->label);
        //$header->addText($logReader->model->logDataId->label);
        //$header->addEmpty();
        $header->addText('Änderungen');

        foreach ($logReader->getData() as $logRow) {

            $tableRow = new AdminTableRow($this);
            //$tableRow->addText($logRow->content->contentType->contentType);
            //$tableRow->addText($logRow->message);
            $tableRow->addText($logRow->user->displayName);
            $tableRow->addText($logRow->dateTime->getShortDateTimeLeadingZeroFormat());
            $tableRow->addYesNo($logRow->create);

            $tableRow->addYesNo($logRow->statusChange);
            $tableRow->addText($logRow->status->status);
            $tableRow->addYesNo($logRow->hasLogData);
            //$tableRow->addText($logRow->logDataId);

            if ($logRow->hasLogData) {

                /** @var AbstractLogContentType $contentType */
                $contentType = $logRow->content->contentType->getContentType();

                if ($contentType->hasLogView()) {
                    $view = $contentType->getLogView($tableRow);
                    $view->logDataId = $logRow->logDataId;
                } else {
                    $tableRow->addText('no log view'); // addEmpty();
                }

            } else {
                $tableRow->addEmpty();
            }


        }


        return parent::getContent();
    }


}