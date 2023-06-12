<?php

namespace Nemundo\ContentTest\Workflow\Approval;

use Nemundo\Content\Index\Workflow\Type\Process\AbstractProcessBuilder;
use Nemundo\ContentTest\App\Poi\Data\Approval\Approval;

class ApprovalBuilder extends AbstractProcessBuilder  // AbstractContentBuilder
{

    public $kommentar;

    protected function loadBuilder()
    {
        $this->contentType = new ApprovalType();
    }


    protected function onCreate()
    {

        $data = new Approval();
        $data->kommentar = $this->kommentar;
        $this->dataId = $data->save();



        //$this->saveWorkflow();

    }


    /*protected function onUpdate()
    {

        $poiItem = new ApprovalItem($this->dataId);
        $poiRow = $poiItem->getDataRow();

        $logId = (new LogIndexContentAction())->onAction($poiItem);

        if ($this->poi !== $poiRow->poi) {

            $data = new PoiLog();
            $data->contentLogId = $logId;
            $data->poiOld = $poiRow->poi;
            $data->poiNew = $this->poi;
            $data->save();

        }


        $update = new PoiUpdate();
        $update->poi = $this->poi;
        $update->updateById($this->dataId);

    }*/


}