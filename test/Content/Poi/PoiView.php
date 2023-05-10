<?php

namespace Nemundo\ContentTest\Content\Poi;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Paragraph\Paragraph;

class PoiView extends AbstractContentView
{
    protected function loadView()
    {
        $this->viewName = 'default';
        $this->viewId = 'fd9145d7-e71e-40fc-add7-d95702bdae3f';
        $this->defaultView = true;
    }

    public function getContent()
    {

        $poiRow = (new PoiItem($this->dataId))->getDataRow();

        $p = new Paragraph($this);
        $p->content = $poiRow->geoCoordinate->getText();

        return parent::getContent();
    }
}