<?php
namespace Nemundo\Content\Index\Workflow\Data\Notification;
class NotificationModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $workflowStatusId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $workflowStatus;

/**
* @var \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

protected function loadModel() {
$this->tableName = "workflow_notification";
$this->aliasTableName = "workflow_notification";
$this->label = "Notification";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_notification";
$this->id->externalTableName = "workflow_notification";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_notification_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->workflowStatusId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->workflowStatusId->tableName = "workflow_notification";
$this->workflowStatusId->fieldName = "workflow_status";
$this->workflowStatusId->aliasFieldName = "workflow_notification_workflow_status";
$this->workflowStatusId->label = "Workflow Status";
$this->workflowStatusId->allowNullValue = false;

$this->userId = new \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType($this);
$this->userId->tableName = "workflow_notification";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "workflow_notification_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;

}
public function loadWorkflowStatus() {
if ($this->workflowStatus == null) {
$this->workflowStatus = new \Nemundo\Content\Data\Content\ContentExternalType($this, "workflow_notification_workflow_status");
$this->workflowStatus->tableName = "workflow_notification";
$this->workflowStatus->fieldName = "workflow_status";
$this->workflowStatus->aliasFieldName = "workflow_notification_workflow_status";
$this->workflowStatus->label = "Workflow Status";
}
return $this;
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "workflow_notification_user");
$this->user->tableName = "workflow_notification";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "workflow_notification_user";
$this->user->label = "User";
}
return $this;
}
}