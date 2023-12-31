<?php

namespace Nemundo\ContentTest\App\Poi\Content\Poi;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\ContentTest\Content\Poi\PoiItem;
use Nemundo\Html\Paragraph\Paragraph;

class PoiView extends AbstractContentView
{
    protected function loadView()
    {
        $this->viewName = 'default';
        $this->viewId = '61e5296c-bfd4-4259-9b4c-a7ddc272310a';
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