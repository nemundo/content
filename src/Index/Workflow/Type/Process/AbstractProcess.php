<?php

namespace Nemundo\Content\Index\Workflow\Type\Process;

use Nemundo\Content\Index\Workflow\Data\Workflow\WorkflowUpdate;
use Nemundo\Content\Index\Workflow\Type\Status\AbstractWorkflowStatusType;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\User\Usergroup\AbstractUsergroup;


// AbstractProcess
abstract class AbstractProcess extends AbstractContentType
{


    public $startStatusClass;


    public function getStartStatusType() {

        /** @var AbstractWorkflowStatusType $type */
        $type = new $this->startStatusClass();
        return $type;


    }







}