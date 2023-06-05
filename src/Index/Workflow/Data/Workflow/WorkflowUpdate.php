<?php
namespace Nemundo\Content\Index\Workflow\Data\Workflow;
use Nemundo\Model\Data\AbstractModelUpdate;
class WorkflowUpdate extends AbstractModelUpdate {
/**
* @var WorkflowModel
*/
public $model;

/**
* @var string
*/
public $processId;

/**
* @var string
*/
public $contentId;

/**
* @var string
*/
public $statusId;

public function __construct() {
parent::__construct();
$this->model = new WorkflowModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->processId, $this->processId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->statusId, $this->statusId);
parent::update();
}
}