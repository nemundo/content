<?php

namespace Nemundo\ContentTest\Content\Poi;

use Nemundo\Content\Index\Log\Action\LogIndexContentAction;
use Nemundo\Content\Index\Workflow\Type\AbstractWorkflowBuilder;
use Nemundo\Content\Type\AbstractContentBuilder;
use Nemundo\ContentTest\App\Poi\Data\Poi\Poi;
use Nemundo\ContentTest\App\Poi\Data\Poi\PoiUpdate;
use Nemundo\ContentTest\App\Poi\Data\PoiLog\PoiLog;

class PoiBuilder extends AbstractWorkflowBuilder  // AbstractContentBuilder
{

    public $poi;

    protected function loadBuilder()
    {
        $this->contentType = new PoiType();
    }


    protected function onCreate()
    {

        $data = new Poi();
        $data->poi = $this->poi;
        $this->dataId = $data->save();

        $this->saveWorkflow();

    }


    protected function onUpdate()
    {

        $poiItem = new PoiItem($this->dataId);
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

    }


}