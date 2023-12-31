<?php
namespace Nemundo\Content\Index\Log\Data\ContentLog;
class ContentLogExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $statusId;

/**
* @var \Nemundo\Content\Index\Log\Data\Status\StatusExternalType
*/
public $status;

/**
* @var \Nemundo\Model\Type\Id\IdType
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
* @var \Nemundo\Model\Type\Id\IdType
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
* @var \Nemundo\Model\Type\Id\IdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ContentLogModel::class;
$this->externalTableName = "log_content_log";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->statusId = new \Nemundo\Model\Type\Id\IdType();
$this->statusId->fieldName = "status";
$this->statusId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->statusId->aliasFieldName = $this->statusId->tableName ."_".$this->statusId->fieldName;
$this->statusId->label = "Status";
$this->addType($this->statusId);

$this->userCreatedId = new \Nemundo\Model\Type\Id\IdType();
$this->userCreatedId->fieldName = "user_created";
$this->userCreatedId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userCreatedId->aliasFieldName = $this->userCreatedId->tableName ."_".$this->userCreatedId->fieldName;
$this->userCreatedId->label = "User Created";
$this->addType($this->userCreatedId);

$this->dateTimeCreated = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->dateTimeCreated->fieldName = "date_time_created";
$this->dateTimeCreated->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTimeCreated->externalTableName = $this->externalTableName;
$this->dateTimeCreated->aliasFieldName = $this->dateTimeCreated->tableName . "_" . $this->dateTimeCreated->fieldName;
$this->dateTimeCreated->label = "Date Time Created";
$this->addType($this->dateTimeCreated);

$this->userLastChangeId = new \Nemundo\Model\Type\Id\IdType();
$this->userLastChangeId->fieldName = "user_last_change";
$this->userLastChangeId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userLastChangeId->aliasFieldName = $this->userLastChangeId->tableName ."_".$this->userLastChangeId->fieldName;
$this->userLastChangeId->label = "User Last Change";
$this->addType($this->userLastChangeId);

$this->dateTimeLastChange = new \Nemundo\Model\Type\DateTime\DateTimeType();
$this->dateTimeLastChange->fieldName = "date_time_last_change";
$this->dateTimeLastChange->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTimeLastChange->externalTableName = $this->externalTableName;
$this->dateTimeLastChange->aliasFieldName = $this->dateTimeLastChange->tableName . "_" . $this->dateTimeLastChange->fieldName;
$this->dateTimeLastChange->label = "Date Time Last Change";
$this->addType($this->dateTimeLastChange);

$this->contentId = new \Nemundo\Model\Type\Id\IdType();
$this->contentId->fieldName = "content";
$this->contentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentId->aliasFieldName = $this->contentId->tableName ."_".$this->contentId->fieldName;
$this->contentId->label = "Content";
$this->addType($this->contentId);

}
public function loadStatus() {
if ($this->status == null) {
$this->status = new \Nemundo\Content\Index\Log\Data\Status\StatusExternalType(null, $this->parentFieldName . "_status");
$this->status->fieldName = "status";
$this->status->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->status->aliasFieldName = $this->status->tableName ."_".$this->status->fieldName;
$this->status->label = "Status";
$this->addType($this->status);
}
return $this;
}
public function loadUserCreated() {
if ($this->userCreated == null) {
$this->userCreated = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user_created");
$this->userCreated->fieldName = "user_created";
$this->userCreated->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userCreated->aliasFieldName = $this->userCreated->tableName ."_".$this->userCreated->fieldName;
$this->userCreated->label = "User Created";
$this->addType($this->userCreated);
}
return $this;
}
public function loadUserLastChange() {
if ($this->userLastChange == null) {
$this->userLastChange = new \Nemundo\User\Data\User\UserExternalType(null, $this->parentFieldName . "_user_last_change");
$this->userLastChange->fieldName = "user_last_change";
$this->userLastChange->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userLastChange->aliasFieldName = $this->userLastChange->tableName ."_".$this->userLastChange->fieldName;
$this->userLastChange->label = "User Last Change";
$this->addType($this->userLastChange);
}
return $this;
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
}