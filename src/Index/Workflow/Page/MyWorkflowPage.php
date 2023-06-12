<?php

namespace Nemundo\Content\Index\Workflow\Page;

use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Index\Workflow\Com\Tab\WorkflowTab;

class MyWorkflowPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new WorkflowTab($layout);

        return parent::getContent();
    }
}