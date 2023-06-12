<?php

namespace Nemundo\ContentTest\App\Poi\Content\PoiNew;

use Nemundo\Content\Index\Workflow\Type\Status\AbstractWorkflowStatusType;
use Nemundo\ContentTest\App\Poi\Content\Approval\ApprovalType;
use Nemundo\ContentTest\App\Poi\Content\PoiEdit\PoiEditType;

class PoiNewType extends AbstractWorkflowStatusType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'PoiNew';
        $this->typeId = '53847134-15c8-47c4-9287-7ff89e74e276';
        $this->formClassList[] = PoiNewForm::class;
        $this->viewClassList[] = PoiNewView::class;
        $this->itemClass = PoiNewItem::class;

        $this->changeStatus = true;
        $this->nextWorkflowStatusClass[] = PoiEditType::class;
        $this->nextWorkflowStatusClass[] = ApprovalType::class;


    }
}