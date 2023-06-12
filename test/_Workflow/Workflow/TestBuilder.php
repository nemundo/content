<?php

namespace Nemundo\ContentTest\Workflow\Workflow;

use Nemundo\Content\Index\Workflow\Type\Process\AbstractProcessBuilder;
use Nemundo\ContentTest\App\Poi\Data\Poi\Poi;

class TestBuilder extends AbstractProcessBuilder  // AbstractContentBuilder
{

    public $poi;

    protected function loadBuilder()
    {
        $this->contentType = new TestProcess();
    }


    protected function onCreate()
    {

        $data = new Poi();
        $data->poi = $this->poi;
        $this->dataId = $data->save();

        //$this->saveWorkflow();

    }


    protected function onUpdate()
    {

        /*$poiItem = new PoiItem($this->dataId);
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
        $update->updateById($this->dataId);*/

    }


}