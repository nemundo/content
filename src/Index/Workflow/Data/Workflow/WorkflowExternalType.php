<?php
namespace Nemundo\Content\Index\Workflow\Data\Workflow;
class WorkflowExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
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
* @var \Nemundo\Model\Type\Id\IdType
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
* @var \Nemundo\Model\Type\Id\IdType
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
* @var \Nemundo\Model\Type\Id\IdType
*/
public $userAssignmentId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $userAssignment;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = WorkflowModel::class;
$this->externalTableName = "workflow_workflow";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->contentId = new \Nemundo\Model\Type\Id\IdType();
$this->contentId->fieldName = "content";
$this->contentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentId->aliasFieldName = $this->contentId->tableName ."_".$this->contentId->fieldName;
$this->contentId->label = "Content";
$this->addType($this->contentId);

$this->dateTimeCreated = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType();
$this->dateTimeCreated->fieldName = "date_time_created";
$this->dateTimeCreated->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTimeCreated->externalTableName = $this->externalTableName;
$this->dateTimeCreated->aliasFieldName = $this->dateTimeCreated->tableName . "_" . $this->dateTimeCreated->fieldName;
$this->dateTimeCreated->label = "Date Time Created";
$this->addType($this->dateTimeCreated);

$this->statusId = new \Nemundo\Model\Type\Id\IdType();
$this->statusId->fieldName = "status";
$this->statusId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->statusId->aliasFieldName = $this->statusId->tableName ."_".$this->statusId->fieldName;
$this->statusId->label = "Status";
$this->addType($this->statusId);

$this->hasUsergroupAssignment = new \Nemundo\Model\Type\Number\YesNoType();
$this->hasUsergroupAssignment->fieldName = "has_usergroup_assignment";
$this->hasUsergroupAssignment->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->hasUsergroupAssignment->externalTableName = $this->externalTableName;
$this->hasUsergroupAssignment->aliasFieldName = $this->hasUsergroupAssignment->tableName . "_" . $this->hasUsergroupAssignment->fieldName;
$this->hasUsergroupAssignment->label = "Has Usergroup Assignment";
$this->addType($this->hasUsergroupAssignment);

$this->usergroupAssignmentId = new \Nemundo\Model\Type\Id\IdType();
$this->usergroupAssignmentId->fieldName = "usergroup_assignment";
$this->usergroupAssignmentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->usergroupAssignmentId->aliasFieldName = $this->usergroupAssignmentId->tableName ."_".$this->usergroupAssignmentId->fieldName;
$this->usergroupAssignmentId->label = "Usergroup Assignment";
$this->addType($this->usergroupAssignmentId);

$this->hasUserAssignment = new \Nemundo\Model\Type\Number\YesNoType();
$this->hasUserAssignment->fieldName = "has_user_assignment";
$this->hasUserAssignment->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->hasUserAssignment->externalTableName = $this->externalTableName;
$this->hasUserAssignment->aliasFieldName = $this->hasUserAssignment->tableName . "_" . $this->hasUserAssignment->fieldName;
$this->hasUserAssignment->label = "Has User Assignment";
$this->addType($this->hasUserAssignment);

$this->userAssignmentId = new \Nemundo\Model\Type\Id\IdType();
$this->userAssignmentId->fieldName = "user_assignment";
$this->userAssignmentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userAssignmentId->aliasFieldName = $this->userAssignmentId->tableName ."_".$this->userAssignmentId->fieldName;
$this->userAssignmentId->label = "User Assignment";
$this->addType($this->userAssignmentId);

}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_content");
$this->content->fieldName = "content";
$this->content->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->content->aliasFieldName = $this->content->tableName ."_".$this->content->fieldName;
$this->content->label = "Content";
$this->addType($this->content);
}
return $this;
}
public function loadStatus() {
if ($this->status == null) {
$this->status = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType(null, $this->parentFieldName . "_status");
$this->status->fieldName = "status";
$this->status->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->status->aliasFieldName = $this->status->tableName ."_".$this->status->fieldName;
$this->status->label = "Status";
$this->addType($this->status);
}
return $this;
}
public function loadUsergroupAssignment() {
if ($this->usergroupAssignment == null) {
$this->usergroupAssignment = new \Nemundo\User\Data\Usergroup\UsergroupExternalType(null, $this->parentFieldName . "_usergroup_assignment");
$this->usergroupAssignment->fieldName = "usergroup_assignment";
$this->usergroupAssignment->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->usergroupAssignment->aliasFieldName = $this->usergroupAssignment->tableName ."_".$this->usergroupAssignment->fieldName;
$this->usergroupAssignment->label = "Usergroup Assignment";
$this->addType($this->usergroupAssignment);
}
return $this;
}
public function loadUserAssignment() {
if ($this->userAssignment == null) {
$this->userAssignment = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user_assignment");
$this->userAssignment->fieldName = "user_assignment";
$this->userAssignment->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userAssignment->aliasFieldName = $this->userAssignment->tableName ."_".$this->userAssignment->fieldName;
$this->userAssignment->label = "User Assignment";
$this->addType($this->userAssignment);
}
return $this;
}
}