<?php

namespace Nemundo\ContentTest\Content\Poi;

use Nemundo\Content\Type\AbstractContentType;

class PoiType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Poi';
        $this->typeId = 'd4b11fca-cc5d-4dca-a673-2e870aa51536';
        $this->formClassList[] = PoiForm::class;
        $this->viewClassList[] = PoiView::class;
        $this->itemClass = PoiItem::class;
        $this->removeClass = PoiRemove::class;
    }
}