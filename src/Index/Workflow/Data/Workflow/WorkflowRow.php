<?php
namespace Nemundo\Content\Index\Workflow\Data\Workflow;
class WorkflowRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var WorkflowModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $contentId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $content;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTimeCreated;

/**
* @var string
*/
public $statusId;

/**
* @var \Nemundo\Content\Row\ContentTypeCustomRow
*/
public $status;

/**
* @var bool
*/
public $hasUsergroupAssignment;

/**
* @var string
*/
public $usergroupAssignmentId;

/**
* @var \Nemundo\User\Data\Usergroup\UsergroupRow
*/
public $usergroupAssignment;

/**
* @var bool
*/
public $hasUserAssignment;

/**
* @var string
*/
public $userAssignmentId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $userAssignment;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->contentId = intval($this->getModelValue($model->contentId));
if ($model->content !== null) {
$this->loadNemundoContentDataContentContentcontentRow($model->content);
}
$this->dateTimeCreated = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTimeCreated));
$this->statusId = $this->getModelValue($model->statusId);
if ($model->status !== null) {
$this->loadNemundoContentDataContentTypeContentTypestatusRow($model->status);
}
$this->hasUsergroupAssignment = boolval($this->getModelValue($model->hasUsergroupAssignment));
$this->usergroupAssignmentId = $this->getModelValue($model->usergroupAssignmentId);
if ($model->usergroupAssignment !== null) {
$this->loadNemundoUserDataUsergroupUsergroupusergroupAssignmentRow($model->usergroupAssignment);
}
$this->hasUserAssignment = boolval($this->getModelValue($model->hasUserAssignment));
$this->userAssignmentId = $this->getModelValue($model->userAssignmentId);
if ($model->userAssignment !== null) {
$this->loadNemundoUserDataUserUseruserAssignmentRow($model->userAssignment);
}
}
private function loadNemundoContentDataContentContentcontentRow($model) {
$this->content = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
private function loadNemundoContentDataContentTypeContentTypestatusRow($model) {
$this->status = new \Nemundo\Content\Row\ContentTypeCustomRow($this->row, $model);
}
private function loadNemundoUserDataUsergroupUsergroupusergroupAssignmentRow($model) {
$this->usergroupAssignment = new \Nemundo\User\Data\Usergroup\UsergroupRow($this->row, $model);
}
private function loadNemundoUserDataUserUseruserAssignmentRow($model) {
$this->userAssignment = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
}