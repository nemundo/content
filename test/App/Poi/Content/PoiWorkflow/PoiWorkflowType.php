<?php

namespace Nemundo\ContentTest\App\Poi\Content\PoiWorkflow;

use Nemundo\Content\Index\Workflow\Type\AbstractWorkflow;
use Nemundo\ContentTest\App\Poi\Content\PoiNew\PoiNewType;

class PoiWorkflowType extends AbstractWorkflow
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Poi Workflow (new)';
        $this->typeId = '85c60882-016a-4485-bacc-6f1b9b2677a9';
        $this->formClassList[] = PoiWorkflowForm::class;
        $this->viewClassList[] = PoiWorkflowView::class;
        $this->itemClass = PoiWorkflowItem::class;

        $this->startStatusClass = PoiNewType::class;

    }
}