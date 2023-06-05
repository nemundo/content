<?php
namespace Nemundo\Content\Index\Workflow\Data\WorkflowLog;
use Nemundo\Model\Data\AbstractModelUpdate;
class WorkflowLogUpdate extends AbstractModelUpdate {
/**
* @var WorkflowLogModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->workflowId, $this->workflowId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
parent::update();
}
}