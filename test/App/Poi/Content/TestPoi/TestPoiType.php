<?php

namespace Nemundo\ContentTest\App\Poi\Content\TestPoi;

use Nemundo\Content\Index\Log\Type\AbstractLogContentType;

class TestPoiType extends AbstractLogContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'TestPoi';
        $this->typeId = '0fb714d0-dada-42a5-bb52-09e7747f99ea';
        $this->formClassList[] = TestPoiForm::class;
        $this->viewClassList[] = TestPoiView::class;
        $this->itemClass = TestPoiItem::class;
        $this->adminClass = TestPoiAdmin::class;
        //$this->removeClass = TestPoiRemove::class;
        $this->logViewClass = TestPoiLogView::class;
    }
}