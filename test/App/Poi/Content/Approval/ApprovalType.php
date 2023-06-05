<?php

namespace Nemundo\ContentTest\App\Poi\Content\Approval;

use Nemundo\Content\Type\AbstractContentType;

class ApprovalType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Approval (new)';
        $this->typeId = '0d5ce94e-8b25-4312-9f3e-d852df2418b8';
        $this->formClassList[] = ApprovalForm::class;
        $this->viewClassList[] = ApprovalView::class;
        $this->itemClass = ApprovalItem::class;
    }
}