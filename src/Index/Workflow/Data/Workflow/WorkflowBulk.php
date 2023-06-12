<?php
namespace Nemundo\Content\Index\Workflow\Data\Workflow;
class WorkflowBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var WorkflowModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->statusId, $this->statusId);
$this->typeValueList->setModelValue($this->model->hasUsergroupAssignment, $this->hasUsergroupAssignment);
$this->typeValueList->setModelValue($this->model->usergroupAssignmentId, $this->usergroupAssignmentId);
$this->typeValueList->setModelValue($this->model->hasUserAssignment, $this->hasUserAssignment);
$this->typeValueList->setModelValue($this->model->userAssignmentId, $this->userAssignmentId);
$id = parent::save();
return $id;
}
}