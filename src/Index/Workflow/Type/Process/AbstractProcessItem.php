<?php

namespace Nemundo\Content\Index\Workflow\Type\Process;

use Nemundo\Content\Index\Workflow\Data\Workflow\WorkflowId;
use Nemundo\Content\Index\Workflow\Data\Workflow\WorkflowUpdate;
use Nemundo\Content\Type\AbstractContentItem;
use Nemundo\User\Usergroup\AbstractUsergroup;

abstract class AbstractProcessItem extends AbstractContentItem
{

    public function getWorkflowId() {

        $id = new WorkflowId();
        $id->model->loadContent();
        $id->filter->andEqual($id->model->content->contentTypeId,$this->contentType->typeId);
        $id->filter->andEqual($id->model->content->dataId,$this->getDataId());
        return $id->getId();

    }


    public function changeUsergroupAssignment(AbstractUsergroup $usergroup) {

        $update = new WorkflowUpdate();
        $update->hasUsergroupAssignment=true;
        $update->usergroupAssignmentId= $usergroup->usergroupId;
        $update->updateById($this->getWorkflowId());

        return $this;

    }


    public function changeUserAssignment($userId) {

        $update = new WorkflowUpdate();
        $update->hasUserAssignment=true;
        $update->userAssignmentId= $userId;
        $update->updateById($this->getDataId());

        return $this;

    }

}