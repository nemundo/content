<?php

namespace Nemundo\ContentTest\App\Poi\Content\TestPoi;

use Nemundo\Content\Index\Log\Status\DeleteStatus;
use Nemundo\Content\Type\AbstractContentRemove;
use Nemundo\ContentTest\App\Poi\Data\Poi\PoiUpdate;

class TestPoiRemove extends AbstractContentRemove
{
    protected function loadRemove()
    {
        $this->contentType = new TestPoiType();
    }

    protected function onDelete()
    {

        $update = new PoiUpdate();
        $update->statusId = (new DeleteStatus())->id;
        $update->updateById($this->dataId);





    }
}