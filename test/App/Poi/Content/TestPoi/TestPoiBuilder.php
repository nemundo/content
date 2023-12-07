<?php

namespace Nemundo\ContentTest\App\Poi\Content\TestPoi;

use Nemundo\Content\Index\Log\Status\ActiveStatus;
use Nemundo\Content\Index\Log\Type\AbstractLogContentBuilder;
use Nemundo\ContentTest\App\Poi\Data\Poi\Poi;
use Nemundo\ContentTest\App\Poi\Data\Poi\PoiUpdate;
use Nemundo\ContentTest\App\Poi\Data\PoiLog\PoiLog;
use Nemundo\ContentTest\Content\Poi\PoiItem;

class TestPoiBuilder extends AbstractLogContentBuilder
{

    public $poi;

    public $description;

    protected function loadBuilder()
    {
        $this->contentType = new TestPoiType();
    }

    protected function onCreate()
    {

        $data = new Poi();
        $data->statusId = (new ActiveStatus())->id;
        $data->poi = $this->poi;
        $data->description = $this->description;
        $this->dataId = $data->save();

        $poiRow = (new TestPoiItem($this->dataId))->getDataRow();

        $data = new PoiLog();
        //$data->contentLogId = $this->getLogId();
        $data->poiHasChanged = true;
        $data->poiNew = $poiRow->poi;
        $data->descriptionHasChanged = true;
        $data->descriptionNew = $poiRow->description;
        $logDataId = $data->save();

        $this->updateLogDataId($logDataId);

    }

    protected function onUpdate()
    {

        $poiOldRow = (new TestPoiItem($this->dataId))->getDataRow();

        $update = new PoiUpdate();
        $update->poi = $this->poi;
        $update->description = $this->description;
        $update->updateById($this->dataId);

        $poiRow = (new TestPoiItem($this->dataId))->getDataRow();

        $data = new PoiLog();
        //$data->contentLogId = $this->getLogId();

        if ($poiRow->poi !== $poiOldRow->poi) {
            $data->poiHasChanged = true;
            $data->poiOld = $poiOldRow->poi;
            $data->poiNew = $poiRow->poi;
        } else {
            $data->poiHasChanged = false;
        }

        if ($poiRow->description !== $poiOldRow->description) {
            $data->descriptionHasChanged = true;
            $data->descriptionOld = $poiOldRow->description;
            $data->descriptionNew = $poiRow->description;
        } else {
            $data->descriptionHasChanged = false;
        }

        //$data->descriptionNew = $poiRow->description;
        $logDataId = $data->save();

        $this->updateLogDataId($logDataId);

    }
}