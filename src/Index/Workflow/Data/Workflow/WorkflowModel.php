<?php
namespace Nemundo\Content\Index\Workflow\Data\Workflow;
class WorkflowModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

/**
* @var \Nemundo\Model\Type\DateTime\CreatedDateTimeType
*/
public $dateTimeCreated;

/**
* @var \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType
*/
public $statusId;

/**
* @var \Nemundo\Content\Data\ContentType\ContentTypeExternalType
*/
public $status;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $hasUsergroupAssignment;

/**
* @var \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType
*/
public $usergroupAssignmentId;

/**
* @var \Nemundo\User\Data\Usergroup\UsergroupExternalType
*/
public $usergroupAssignment;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $hasUserAssignment;

/**
* @var \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType
*/
public $userAssignmentId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $userAssignment;

protected function loadModel() {
$this->tableName = "workflow_workflow";
$this->aliasTableName = "workflow_workflow";
$this->label = "Workflow";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_workflow";
$this->id->externalTableName = "workflow_workflow";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_workflow_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->contentId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->contentId->tableName = "workflow_workflow";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "workflow_workflow_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = false;

$this->dateTimeCreated = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTimeCreated->tableName = "workflow_workflow";
$this->dateTimeCreated->externalTableName = "workflow_workflow";
$this->dateTimeCreated->fieldName = "date_time_created";
$this->dateTimeCreated->aliasFieldName = "workflow_workflow_date_time_created";
$this->dateTimeCreated->label = "Date Time Created";
$this->dateTimeCreated->allowNullValue = false;

$this->statusId = new \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType($this);
$this->statusId->tableName = "workflow_workflow";
$this->statusId->fieldName = "status";
$this->statusId->aliasFieldName = "workflow_workflow_status";
$this->statusId->label = "Status";
$this->statusId->allowNullValue = false;

$this->hasUsergroupAssignment = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->hasUsergroupAssignment->tableName = "workflow_workflow";
$this->hasUsergroupAssignment->externalTableName = "workflow_workflow";
$this->hasUsergroupAssignment->fieldName = "has_usergroup_assignment";
$this->hasUsergroupAssignment->aliasFieldName = "workflow_workflow_has_usergroup_assignment";
$this->hasUsergroupAssignment->label = "Has Usergroup Assignment";
$this->hasUsergroupAssignment->allowNullValue = false;

$this->usergroupAssignmentId = new \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType($this);
$this->usergroupAssignmentId->tableName = "workflow_workflow";
$this->usergroupAssignmentId->fieldName = "usergroup_assignment";
$this->usergroupAssignmentId->aliasFieldName = "workflow_workflow_usergroup_assignment";
$this->usergroupAssignmentId->label = "Usergroup Assignment";
$this->usergroupAssignmentId->allowNullValue = false;

$this->hasUserAssignment = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->hasUserAssignment->tableName = "workflow_workflow";
$this->hasUserAssignment->externalTableName = "workflow_workflow";
$this->hasUserAssignment->fieldName = "has_user_assignment";
$this->hasUserAssignment->aliasFieldName = "workflow_workflow_has_user_assignment";
$this->hasUserAssignment->label = "Has User Assignment";
$this->hasUserAssignment->allowNullValue = false;

$this->userAssignmentId = new \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType($this);
$this->userAssignmentId->tableName = "workflow_workflow";
$this->userAssignmentId->fieldName = "user_assignment";
$this->userAssignmentId->aliasFieldName = "workflow_workflow_user_assignment";
$this->userAssignmentId->label = "User Assignment";
$this->userAssignmentId->allowNullValue = false;

}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "workflow_workflow_content");
$this->content->tableName = "workflow_workflow";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "workflow_workflow_content";
$this->content->label = "Content";
}
return $this;
}
public function loadStatus() {
if ($this->status == null) {
$this->status = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType($this, "workflow_workflow_status");
$this->status->tableName = "workflow_workflow";
$this->status->fieldName = "status";
$this->status->aliasFieldName = "workflow_workflow_status";
$this->status->label = "Status";
}
return $this;
}
public function loadUsergroupAssignment() {
if ($this->usergroupAssignment == null) {
$this->usergroupAssignment = new \Nemundo\User\Data\Usergroup\UsergroupExternalType($this, "workflow_workflow_usergroup_assignment");
$this->usergroupAssignment->tableName = "workflow_workflow";
$this->usergroupAssignment->fieldName = "usergroup_assignment";
$this->usergroupAssignment->aliasFieldName = "workflow_workflow_usergroup_assignment";
$this->usergroupAssignment->label = "Usergroup Assignment";
}
return $this;
}
public function loadUserAssignment() {
if ($this->userAssignment == null) {
$this->userAssignment = new \Nemundo\User\Data\User\UserExternalType($this, "workflow_workflow_user_assignment");
$this->userAssignment->tableName = "workflow_workflow";
$this->userAssignment->fieldName = "user_assignment";
$this->userAssignment->aliasFieldName = "workflow_workflow_user_assignment";
$this->userAssignment->label = "User Assignment";
}
return $this;
}
}