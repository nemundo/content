<?php

namespace Nemundo\Content\Index\Workflow\Action;

use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\Index\Workflow\Data\Workflow\Workflow;
use Nemundo\Content\Index\Workflow\Data\WorkflowLog\WorkflowLog;
use Nemundo\Content\Type\AbstractContentItem;

class WorkflowLogAction extends AbstractContentAction
{

    public $workflowId;

    protected function loadAction()
    {

    }


    public function onAction(AbstractContentItem $item)
    {

        $data = new WorkflowLog();
        $data->workflowId = $this->workflowId;
        $data->contentId = $item->getContentId();
        $data->save();

    }

}