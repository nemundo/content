<?php
namespace Nemundo\Content\Index\Workflow\Data\Workflow;
class WorkflowCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var WorkflowModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new WorkflowModel();
}
}