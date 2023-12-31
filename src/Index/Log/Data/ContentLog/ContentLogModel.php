<?php
namespace Nemundo\Content\Index\Log\Data\ContentLog;
class ContentLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $statusId;

/**
* @var \Nemundo\Content\Index\Log\Data\Status\StatusExternalType
*/
public $status;

/**
* @var \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType
*/
public $userCreatedId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $userCreated;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTimeCreated;

/**
* @var \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType
*/
public $userLastChangeId;

/**
* @var \Nemundo\User\Data\User\UserExternalType
*/
public $userLastChange;

/**
* @var \Nemundo\Model\Type\DateTime\DateTimeType
*/
public $dateTimeLastChange;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

protected function loadModel() {
$this->tableName = "log_content_log";
$this->aliasTableName = "log_content_log";
$this->label = "Content Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "log_content_log";
$this->id->externalTableName = "log_content_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "log_content_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->statusId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->statusId->tableName = "log_content_log";
$this->statusId->fieldName = "status";
$this->statusId->aliasFieldName = "log_content_log_status";
$this->statusId->label = "Status";
$this->statusId->allowNullValue = false;

$this->userCreatedId = new \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType($this);
$this->userCreatedId->tableName = "log_content_log";
$this->userCreatedId->fieldName = "user_created";
$this->userCreatedId->aliasFieldName = "log_content_log_user_created";
$this->userCreatedId->label = "User Created";
$this->userCreatedId->allowNullValue = false;

$this->dateTimeCreated = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTimeCreated->tableName = "log_content_log";
$this->dateTimeCreated->externalTableName = "log_content_log";
$this->dateTimeCreated->fieldName = "date_time_created";
$this->dateTimeCreated->aliasFieldName = "log_content_log_date_time_created";
$this->dateTimeCreated->label = "Date Time Created";
$this->dateTimeCreated->allowNullValue = false;

$this->userLastChangeId = new \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType($this);
$this->userLastChangeId->tableName = "log_content_log";
$this->userLastChangeId->fieldName = "user_last_change";
$this->userLastChangeId->aliasFieldName = "log_content_log_user_last_change";
$this->userLastChangeId->label = "User Last Change";
$this->userLastChangeId->allowNullValue = false;

$this->dateTimeLastChange = new \Nemundo\Model\Type\DateTime\DateTimeType($this);
$this->dateTimeLastChange->tableName = "log_content_log";
$this->dateTimeLastChange->externalTableName = "log_content_log";
$this->dateTimeLastChange->fieldName = "date_time_last_change";
$this->dateTimeLastChange->aliasFieldName = "log_content_log_date_time_last_change";
$this->dateTimeLastChange->label = "Date Time Last Change";
$this->dateTimeLastChange->allowNullValue = false;

$this->contentId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->contentId->tableName = "log_content_log";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "log_content_log_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "content";
$index->addType($this->contentId);

}
public function loadStatus() {
if ($this->status == null) {
$this->status = new \Nemundo\Content\Index\Log\Data\Status\StatusExternalType($this, "log_content_log_status");
$this->status->tableName = "log_content_log";
$this->status->fieldName = "status";
$this->status->aliasFieldName = "log_content_log_status";
$this->status->label = "Status";
}
return $this;
}
public function loadUserCreated() {
if ($this->userCreated == null) {
$this->userCreated = new \Nemundo\User\Data\User\UserExternalType($this, "log_content_log_user_created");
$this->userCreated->tableName = "log_content_log";
$this->userCreated->fieldName = "user_created";
$this->userCreated->aliasFieldName = "log_content_log_user_created";
$this->userCreated->label = "User Created";
}
return $this;
}
public function loadUserLastChange() {
if ($this->userLastChange == null) {
$this->userLastChange = new \Nemundo\User\Data\User\UserExternalType($this, "log_content_log_user_last_change");
$this->userLastChange->tableName = "log_content_log";
$this->userLastChange->fieldName = "user_last_change";
$this->userLastChange->aliasFieldName = "log_content_log_user_last_change";
$this->userLastChange->label = "User Last Change";
}
return $this;
}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "log_content_log_content");
$this->content->tableName = "log_content_log";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "log_content_log_content";
$this->content->label = "Content";
}
return $this;
}
}