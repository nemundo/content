<?php
namespace Nemundo\Content\Index\Workflow\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class WorkflowParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'workflow';
}
}