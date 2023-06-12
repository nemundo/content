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
public $contentId;

/**
* @var string
*/
public $statusId;

/**
* @var bool
*/
public $hasUsergroupAssignment;

/**
* @var string
*/
public $usergroupAssignmentId;

/**
* @var bool
*/
public $hasUserAssignment;

/**
* @var string
*/
public $userAssignmentId;

public function __construct() {
parent::__construct();
$this->model = new WorkflowModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->statusId, $this->statusId);
$this->typeValueList->setModelValue($this->model->hasUsergroupAssignment, $this->hasUsergroupAssignment);
$this->typeValueList->setModelValue($this->model->usergroupAssignmentId, $this->usergroupAssignmentId);
$this->typeValueList->setModelValue($this->model->hasUserAssignment, $this->hasUserAssignment);
$this->typeValueList->setModelValue($this->model->userAssignmentId, $this->userAssignmentId);
parent::update();
}
}