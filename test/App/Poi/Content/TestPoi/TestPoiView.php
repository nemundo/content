<?php

namespace Nemundo\ContentTest\App\Poi\Content\TestPoi;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\ContentTest\Content\Poi\PoiItem;
use Nemundo\Html\Paragraph\Paragraph;

class TestPoiView extends AbstractContentView
{
    protected function loadView()
    {
        $this->viewName = 'default';
        $this->viewId = '369f737d-585f-4373-a797-ca9dd65b5746';
        $this->defaultView = true;
    }

    public function getContent()
    {

        $poiRow = (new TestPoiItem($this->dataId))->getDataRow();

        $p = new Paragraph($this);
        $p->content = $poiRow->description;

        return parent::getContent();

    }
}