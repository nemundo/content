<?php
namespace Nemundo\Content\Index\Log\Data\Log;
class LogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

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

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $create;

/**
* @var \Nemundo\Model\Type\Number\NumberType
*/
public $logDataId;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $statusChange;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $statusId;

/**
* @var \Nemundo\Content\Index\Log\Data\Status\StatusExternalType
*/
public $status;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $hasLogData;

protected function loadModel() {
$this->tableName = "content_log";
$this->aliasTableName = "content_log";
$this->label = "Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_log";
$this->id->externalTableName = "content_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType($this);
$this->dateTime->tableName = "content_log";
$this->dateTime->externalTableName = "content_log";
$this->dateTime->fieldName = "date_time";
$this->dateTime->aliasFieldName = "content_log_date_time";
$this->dateTime->label = "Date Time";
$this->dateTime->allowNullValue = true;

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType($this);
$this->userId->tableName = "content_log";
$this->userId->fieldName = "user";
$this->userId->aliasFieldName = "content_log_user";
$this->userId->label = "User";
$this->userId->allowNullValue = true;

$this->contentId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->contentId->tableName = "content_log";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "content_log_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = false;

$this->create = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->create->tableName = "content_log";
$this->create->externalTableName = "content_log";
$this->create->fieldName = "create";
$this->create->aliasFieldName = "content_log_create";
$this->create->label = "Create";
$this->create->allowNullValue = false;

$this->logDataId = new \Nemundo\Model\Type\Number\NumberType($this);
$this->logDataId->tableName = "content_log";
$this->logDataId->externalTableName = "content_log";
$this->logDataId->fieldName = "log_data_id";
$this->logDataId->aliasFieldName = "content_log_log_data_id";
$this->logDataId->label = "Log Data Id";
$this->logDataId->allowNullValue = false;

$this->statusChange = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->statusChange->tableName = "content_log";
$this->statusChange->externalTableName = "content_log";
$this->statusChange->fieldName = "status_change";
$this->statusChange->aliasFieldName = "content_log_status_change";
$this->statusChange->label = "Status Change";
$this->statusChange->allowNullValue = false;

$this->statusId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->statusId->tableName = "content_log";
$this->statusId->fieldName = "status";
$this->statusId->aliasFieldName = "content_log_status";
$this->statusId->label = "Status";
$this->statusId->allowNullValue = false;

$this->hasLogData = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->hasLogData->tableName = "content_log";
$this->hasLogData->externalTableName = "content_log";
$this->hasLogData->fieldName = "has_log_data";
$this->hasLogData->aliasFieldName = "content_log_has_log_data";
$this->hasLogData->label = "Has Log Data";
$this->hasLogData->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "content";
$index->addType($this->contentId);

}
public function loadUser() {
if ($this->user == null) {
$this->user = new \Nemundo\User\Data\User\UserExternalType($this, "content_log_user");
$this->user->tableName = "content_log";
$this->user->fieldName = "user";
$this->user->aliasFieldName = "content_log_user";
$this->user->label = "User";
}
return $this;
}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "content_log_content");
$this->content->tableName = "content_log";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "content_log_content";
$this->content->label = "Content";
}
return $this;
}
public function loadStatus() {
if ($this->status == null) {
$this->status = new \Nemundo\Content\Index\Log\Data\Status\StatusExternalType($this, "content_log_status");
$this->status->tableName = "content_log";
$this->status->fieldName = "status";
$this->status->aliasFieldName = "content_log_status";
$this->status->label = "Status";
}
return $this;
}
}