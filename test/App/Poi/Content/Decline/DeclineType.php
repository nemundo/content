<?php

namespace Nemundo\ContentTest\App\Poi\Content\Decline;

use Nemundo\Content\Type\AbstractContentType;

class DeclineType extends AbstractContentType
{
    protected function loadContentType()
    {
        $this->typeLabel = 'Decline (new)';
        $this->typeId = '14cf0d85-b408-47c2-b091-b518a8a41527';
        $this->formClassList[] = DeclineForm::class;
        $this->viewClassList[] = DeclineView::class;
        $this->itemClass = DeclineItem::class;
    }
}