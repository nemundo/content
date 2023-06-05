<?php

namespace Nemundo\Content\Index\Workflow\Type;

use Nemundo\Content\Index\Workflow\Type\Status\AbstractWorkflowStatusType;
use Nemundo\Content\Type\AbstractContentType;

abstract class AbstractWorkflow extends AbstractContentType
{


    public $startStatusClass;


    public function getStartStatusType() {

        /** @var AbstractWorkflowStatusType $type */
        $type = new $this->startStatusClass();
        return $type;


    }




}