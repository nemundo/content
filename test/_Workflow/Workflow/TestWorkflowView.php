<?php

namespace Nemundo\ContentTest\Workflow\Workflow;

use Nemundo\Content\View\AbstractContentView;

class TestWorkflowView extends AbstractContentView
{


    protected function loadView()
    {
        $this->contentType = new TestProcess();
        // TODO: Implement loadView() method.
    }


    public function getContent()
    {




        return parent::getContent(); // TODO: Change the autogenerated stub
    }

}