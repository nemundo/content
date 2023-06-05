<?php

namespace Nemundo\ContentTest\App\Poi\Content\Approval;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Paragraph\Paragraph;

class ApprovalView extends AbstractContentView
{
    protected function loadView()
    {
        $this->viewName = 'default';
        $this->viewId = 'fa22eace-f11c-452f-b554-0ab4cc9788f9';
        $this->defaultView = true;
    }

    public function getContent()
    {

        $poiRow = (new ApprovalItem($this->dataId))->getDataRow();

        $p = new Paragraph($this);
        $p->content = $poiRow->kommentar;

        return parent::getContent();
    }
}