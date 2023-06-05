<?php

namespace Nemundo\ContentTest\Workflow\Workflow;

use Nemundo\Content\Index\Workflow\Type\AbstractWorkflow;
use Nemundo\ContentTest\Content\Poi\PoiForm;
use Nemundo\ContentTest\Content\Poi\PoiItem;
use Nemundo\ContentTest\Content\Poi\PoiRemove;
use Nemundo\ContentTest\Content\Poi\PoiView;

class TestWorkflow extends AbstractWorkflow
{

    protected function loadContentType()
    {

        $this->typeLabel = 'Poi Workflow';
        $this->typeId = 'd4b11fca-cc5d-4dca-a673-2e870aa51531';
        $this->formClassList[] = TestForm::class;
        $this->itemClass= TestWorkflowItem::class;
        $this->viewClassList[]= TestWorkflowView::class;

        /*$this->formClassList[] = PoiForm::class;
        $this->viewClassList[] = PoiView::class;
        $this->itemClass = PoiItem::class;
        $this->removeClass = PoiRemove::class;*/

    }

}