<?php
namespace Nemundo\Content\Index\Workflow\Data\WorkflowLog;
class WorkflowLogValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var WorkflowLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowLogModel();
}
}