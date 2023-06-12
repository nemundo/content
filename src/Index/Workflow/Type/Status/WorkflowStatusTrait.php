<?php

namespace Nemundo\Content\Index\Workflow\Type\Status;

use Nemundo\Content\Type\AbstractContentType;

trait WorkflowStatusTrait
{

    /**
     * @var bool
     */
    public $changeStatus = false;


    public $nextWorkflowStatusClass =[];






    public function getNextWorkflowStatus() {


        /** @var AbstractContentType[] $list */
        $list= [];

        foreach ($this->nextWorkflowStatusClass as $statusClass) {

            $status = new $statusClass();

        }

        return $list;



    }




}