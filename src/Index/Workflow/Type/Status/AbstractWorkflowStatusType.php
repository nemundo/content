<?php

namespace Nemundo\Content\Index\Workflow\Type\Status;

use Nemundo\Content\Type\AbstractContentType;

abstract class AbstractWorkflowStatusType extends AbstractContentType
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