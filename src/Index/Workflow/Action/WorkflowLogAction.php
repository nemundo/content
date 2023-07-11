<?php

namespace Nemundo\Content\Index\Workflow\Action;

use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\Index\Workflow\Data\Workflow\Workflow;
use Nemundo\Content\Index\Workflow\Data\Workflow\WorkflowUpdate;
use Nemundo\Content\Index\Workflow\Data\WorkflowLog\WorkflowLog;
use Nemundo\Content\Index\Workflow\Type\Status\AbstractWorkflowStatusItem;
use Nemundo\Content\Type\AbstractContentItem;


// StatusAction
class WorkflowLogAction extends AbstractContentAction
{

    public $workflowId;

    protected function loadAction()
    {

    }


    /**
     * @param AbstractWorkflowStatusItem $item
     * @return void
     */
    public function onAction(AbstractContentItem $item)
    {

        $data = new WorkflowLog();
        $data->workflowId = $this->workflowId;
        $data->contentId = $item->getContentId();
        $data->save();


        if ($item->contentType->changeStatus) {
            $update = new WorkflowUpdate();
            $update->statusId = $item->contentType->typeId;
            $update->updateById($this->workflowId);
        }

    }

}