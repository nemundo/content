<?php

namespace Nemundo\ContentTest\Workflow\Approval;

use Nemundo\Content\Type\AbstractContentType;

class ApprovalType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Approval';
        $this->typeId = 'd4b11fca-cc5d-4dca-a673-2e870aa51517';
        $this->formClassList[] = ApprovalForm::class;
        $this->viewClassList[] = ApprovalView::class;
        $this->itemClass = ApprovalItem::class;
        //$this->removeClass = PoiRemove::class;
    }
}