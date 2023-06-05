<?php

namespace Nemundo\ContentTest\Content\Poi;

use Nemundo\Content\Type\AbstractContentRemove;
use Nemundo\ContentTest\App\Poi\Data\Poi\PoiDelete;

class PoiRemove extends AbstractContentRemove
{
    protected function loadRemove()
    {
        $this->contentType = new PoiType();
    }

    protected function onDelete()
    {
        (new PoiDelete())->deleteById($this->dataId);
    }
}