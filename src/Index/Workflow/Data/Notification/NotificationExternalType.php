<?php
namespace Nemundo\Content\Index\Workflow\Data\Notification;
class NotificationExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $workflowStatusId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $workflowStatus;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = NotificationModel::class;
$this->externalTableName = "workflow_notification";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->workflowStatusId = new \Nemundo\Model\Type\Id\IdType();
$this->workflowStatusId->fieldName = "workflow_status";
$this->workflowStatusId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflowStatusId->aliasFieldName = $this->workflowStatusId->tableName ."_".$this->workflowStatusId->fieldName;
$this->workflowStatusId->label = "Workflow Status";
$this->addType($this->workflowStatusId);

$this->userId = new \Nemundo\Model\Type\Id\IdType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

}
public function loadWorkflowStatus() {
if ($this->workflowStatus == null) {
$this->workflowStatus = new \Nemundo\Content\Data\Content\ContentExternalType(null, $this->parentFieldName . "_workflow_status");
$this->workflowStatus->fieldName = "workflow_status";
$this->workflowStatus->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->workflowStatus->aliasFieldName = $this->workflowStatus->tableName ."_".$this->workflowStatus->fieldName;
$this->workflowStatus->label = "Workflow Status";
$this->addType($this->workflowStatus);
}
return $this;
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user");
$this->user->fieldName = "user";
$this->user->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->user->aliasFieldName = $this->user->tableName ."_".$this->user->fieldName;
$this->user->label = "User";
$this->addType($this->user);
}
return $this;
}
}