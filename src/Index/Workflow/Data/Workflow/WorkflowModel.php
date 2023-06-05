<?php
namespace Nemundo\Content\Index\Workflow\Data\Workflow;
class WorkflowModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType
*/
public $processId;

/**
* @var \Nemundo\Content\Index\Workflow\Data\Process\ProcessExternalType
*/
public $process;

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

$this->processId = new \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType($this);
$this->processId->tableName = "workflow_workflow";
$this->processId->fieldName = "process";
$this->processId->aliasFieldName = "workflow_workflow_process";
$this->processId->label = "Process";
$this->processId->allowNullValue = false;

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

}
public function loadProcess() {
if ($this->process == null) {
$this->process = new \Nemundo\Content\Index\Workflow\Data\Process\ProcessExternalType($this, "workflow_workflow_process");
$this->process->tableName = "workflow_workflow";
$this->process->fieldName = "process";
$this->process->aliasFieldName = "workflow_workflow_process";
$this->process->label = "Process";
}
return $this;
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
}