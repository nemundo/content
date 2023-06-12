<?php

namespace Nemundo\ContentTest\Workflow\Workflow;

use Nemundo\Content\Index\Workflow\Type\Process\AbstractProcess;

class TestProcess extends AbstractProcess
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