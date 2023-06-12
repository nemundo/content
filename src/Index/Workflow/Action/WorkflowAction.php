<?php

namespace Nemundo\Content\Index\Workflow\Action;

use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\Index\Workflow\Data\Workflow\Workflow;
use Nemundo\Content\Type\AbstractContentItem;

class WorkflowAction extends AbstractContentAction
{

    protected function loadAction()
    {

    }


    public function onAction(AbstractContentItem $item)
    {

        $data = new Workflow();
        $data->contentId = $item->getContentId();
        $data->hasUsergroupAssignment = false;
        $data->hasUserAssignment = false;
        return $data->save();


    }

}