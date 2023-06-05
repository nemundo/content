<?php
namespace Nemundo\Content\Index\Workflow\Data\WorkflowLog;
class WorkflowLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $workflowId;

/**
* @var \Nemundo\Content\Index\Workflow\Data\Workflow\WorkflowExternalType
*/
public $workflow;

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
public $dateTime;

/**
* @var \Nemundo\Model\Type\User\CreatedUserType
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $user;

protected function loadModel() {
$this->tableName = "workflow_workflow_log";
$this->aliasTableName = "workflow_workflow_log";
$this->label = "Workflow Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_workflow_log";
$this->id->externalTableName = "workflow_workflow_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_workflow_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->workflowId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->workflowId->tableName = "workflow_workflow_log";
$this->workflowId->fieldName = "workflow";
$this->workflowId->aliasFieldName = "workflow_workflow_log_workflow";
$this->workflowId->label = "Workflow";
$this->workflowId->allowNullValue = false;

$this->contentId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->contentId->tableName = "workflow_workflow_log";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "workflow_workflow_log_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = false;

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTime->tableName = "workflow_workflow_log";
$this->dateTime->externalTableName = "workflow_workflow_log";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "workflow_workflow_log_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = false;

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType($this);
$this->userId->tableName = "workflow_workflow_log";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "workflow_workflow_log_user";
$this->userId->label = "User";
$this->userId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "workflow";
$index->addType($this->workflowId);

}
public function loadWorkflow() {
if ($this->workflow == null) {
$this->workflow = new \Nemundo\Content\Index\Workflow\Data\Workflow\WorkflowExternalType($this, "workflow_workflow_log_workflow");
$this->workflow->tableName = "workflow_workflow_log";
$this->workflow->fieldName = "workflow";
$this->workflow->aliasFieldName = "workflow_workflow_log_workflow";
$this->workflow->label = "Workflow";
}
return $this;
}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "workflow_workflow_log_content");
$this->content->tableName = "workflow_workflow_log";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "workflow_workflow_log_content";
$this->content->label = "Content";
}
return $this;
}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "workflow_workflow_log_user");
$this->user->tableName = "workflow_workflow_log";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "workflow_workflow_log_user";
$this->user->label = "User";
}
return $this;
}
}