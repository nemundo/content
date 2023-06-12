<?php

namespace Nemundo\ContentTest\App\Gastro\Content\GastroErfassung;

use Nemundo\Content\Index\Workflow\Type\Status\AbstractWorkflowStatusType;
use Nemundo\ContentTest\App\Poi\Content\Approval\ApprovalType;

class GastroErfassungType extends AbstractWorkflowStatusType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'GastroErfassung';
        $this->typeId = '47d41175-a9c9-407f-915e-b2744f0ea65a';
        $this->formClassList[] = GastroErfassungForm::class;
        $this->viewClassList[] = GastroErfassungView::class;
        $this->itemClass = GastroErfassungItem::class;
        $this->changeStatus = true;

        $this->nextWorkflowStatusClass[] = ApprovalType::class;

    }
}