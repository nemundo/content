<?php

namespace Nemundo\ContentTest\App\Poi\Content\TestPoi;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Content\Index\Log\Data\Log\Log;
use Nemundo\Content\Index\Log\Status\ActiveStatus;
use Nemundo\Content\Index\Log\Status\DeleteStatus;
use Nemundo\Content\Index\Log\Type\AbstractLogContentAdmin;
use Nemundo\ContentTest\App\Poi\Data\Poi\PoiReader;
use Nemundo\ContentTest\App\Poi\Data\Poi\PoiUpdate;

class TestPoiAdmin extends AbstractLogContentAdmin
{

    protected function onIndex()
    {


        $table = new AdminTable($this);

        $reader = new PoiReader();
        $reader->model->loadStatus();

        $header = new AdminTableHeader($table);
        $header->addText($reader->model->status->label);
        $header->addText($reader->model->poi->label);
        $header->addText($reader->model->description->label);
        $header->addEmpty(4);

        foreach ($reader->getData() as $poiRow) {

            $row = new AdminTableRow($table);
            $row->addText($poiRow->status->status);
            //$row->addText($poiRow->poi);
            $row->addSite($this->getViewSite($poiRow->id, $poiRow->poi));

            $row->addText($poiRow->description);
            $row->addIconActionSite($this->getEditSite($poiRow->id));

            if ($poiRow->statusId <> (new DeleteStatus())->id) {
                //$row->addIconActionSite($this->getDeleteSite($poiRow->id));
                $row->addIconActionSite($this->getInactiveSite($poiRow->id));
            } else {
                $row->addEmpty();
            }

            if ($poiRow->statusId == (new DeleteStatus())->id) {
                $row->addIconActionSite($this->getActiveSite($poiRow->id));
            } else {
                $row->addEmpty();
            }

            $row->addIconActionSite($this->getLogSite($poiRow->id));

            if ($poiRow->statusId == (new DeleteStatus())->id) {
                $row->strikeThrough = true;
            }

        }


    }


    protected function onActive($dataId)
    {

        $update = new PoiUpdate();
        $update->statusId = (new ActiveStatus())->id;
        $update->updateById($dataId);

        $this->saveActive($dataId);

        /*$data = new Log();
        $data->contentId = $this->contentType->getItem($dataId)->getContentId();
        //$data->message = 'Log Message';
        $data->statusChange = true;
        $data->statusId = (new ActiveStatus())->id;
        $data->logDataId = false;
        $data->save();*/

    }


    protected function onInactive($dataId)
    {

        $update = new PoiUpdate();
        $update->statusId = (new DeleteStatus())->id;
        $update->updateById($dataId);

        $this->saveInactive($dataId);

        /*$data = new Log();
        $data->contentId = $this->contentType->getItem($dataId)->getContentId();
        //$data->message = 'Log Message';
        $data->statusChange = true;
        $data->statusId = (new DeleteStatus())->id;
        $data->logDataId = false;
        $data->save();*/

    }

}