<?php

namespace Nemundo\Content\Index\Workflow\Type\Status;

use Nemundo\Content\Type\AbstractContentType;

abstract class AbstractWorkflowStatusType extends AbstractContentType
{

    /**
     * @var bool
     */
    public $changeStatus = false;

    public $nextWorkflowStatusClass = [];


    public function getNextWorkflowStatusList()
    {

        /** @var AbstractContentType[] $list */
        $list = [];

        foreach ($this->nextWorkflowStatusClass as $statusClass) {
            $list[] = new $statusClass();
        }

        return $list;

    }

}