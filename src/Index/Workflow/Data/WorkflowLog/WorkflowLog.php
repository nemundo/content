<?php
namespace Nemundo\Content\Index\Workflow\Data\WorkflowLog;
class WorkflowLog extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var WorkflowLogModel
*/
protected $model;

/**
* @var string
*/
public $workflowId;

/**
* @var string
*/
public $contentId;

public function __construct() {
parent::__construct();
$this->model = new WorkflowLogModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$id = parent::save();
return $id;
}
}