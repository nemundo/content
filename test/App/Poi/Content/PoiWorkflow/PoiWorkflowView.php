<?php

namespace Nemundo\ContentTest\App\Poi\Content\PoiWorkflow;

use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Paragraph\Paragraph;

class PoiWorkflowView extends AbstractContentView
{
    protected function loadView()
    {
        $this->viewName = 'default';
        $this->viewId = '3e5eab42-e2e4-49f8-8930-22cb75a87395';
        $this->defaultView = true;
    }

    public function getContent()
    {



       /* $poiRow = (new PoiWorkflowItem($this->dataId))->getDataRow();

        $p = new Paragraph($this);
        $p->content = 'Workflow View';


        $p = new Paragraph($this);
        $p->content = $poiRow->poi;*/




        return parent::getContent();
    }
}