<?php
namespace Nemundo\Content\Index\Log\Data\Log;
class LogExternalType extends \Nemundo\Model\Type\External\ExternalType {
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
* @var \Nemundo\Model\Type\Id\IdType
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
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = LogModel::class;
$this->externalTableName = "content_log";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->dateTime = new \Nemundo\Model\Type\DateTime\CreatedDateTimeType();
$this->dateTime->fieldName = "date_time";
$this->dateTime->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->dateTime->externalTableName = $this->externalTableName;
$this->dateTime->aliasFieldName = $this->dateTime->tableName . "_" . $this->dateTime->fieldName;
$this->dateTime->label = "Date Time";
$this->addType($this->dateTime);

$this->userId = new \Nemundo\Model\Type\User\CreatedUserType();
$this->userId->fieldName = "user";
$this->userId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->userId->aliasFieldName = $this->userId->tableName ."_".$this->userId->fieldName;
$this->userId->label = "User";
$this->addType($this->userId);

$this->contentId = new \Nemundo\Model\Type\Id\IdType();
$this->contentId->fieldName = "content";
$this->contentId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentId->aliasFieldName = $this->contentId->tableName ."_".$this->contentId->fieldName;
$this->contentId->label = "Content";
$this->addType($this->contentId);

$this->create = new \Nemundo\Model\Type\Number\YesNoType();
$this->create->fieldName = "create";
$this->create->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->create->externalTableName = $this->externalTableName;
$this->create->aliasFieldName = $this->create->tableName . "_" . $this->create->fieldName;
$this->create->label = "Create";
$this->addType($this->create);

$this->logDataId = new \Nemundo\Model\Type\Number\NumberType();
$this->logDataId->fieldName = "log_data_id";
$this->logDataId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->logDataId->externalTableName = $this->externalTableName;
$this->logDataId->aliasFieldName = $this->logDataId->tableName . "_" . $this->logDataId->fieldName;
$this->logDataId->label = "Log Data Id";
$this->addType($this->logDataId);

$this->statusChange = new \Nemundo\Model\Type\Number\YesNoType();
$this->statusChange->fieldName = "status_change";
$this->statusChange->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->statusChange->externalTableName = $this->externalTableName;
$this->statusChange->aliasFieldName = $this->statusChange->tableName . "_" . $this->statusChange->fieldName;
$this->statusChange->label = "Status Change";
$this->addType($this->statusChange);

$this->statusId = new \Nemundo\Model\Type\Id\IdType();
$this->statusId->fieldName = "status";
$this->statusId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->statusId->aliasFieldName = $this->statusId->tableName ."_".$this->statusId->fieldName;
$this->statusId->label = "Status";
$this->addType($this->statusId);

$this->hasLogData = new \Nemundo\Model\Type\Number\YesNoType();
$this->hasLogData->fieldName = "has_log_data";
$this->hasLogData->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->hasLogData->externalTableName = $this->externalTableName;
$this->hasLogData->aliasFieldName = $this->hasLogData->tableName . "_" . $this->hasLogData->fieldName;
$this->hasLogData->label = "Has Log Data";
$this->addType($this->hasLogData);

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
$this->status = new \Nemundo\Content\Index\Log\Data\Status\StatusExternalType(null, $this->parentFieldName . "_status");
$this->status->fieldName = "status";
$this->status->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->status->aliasFieldName = $this->status->tableName ."_".$this->status->fieldName;
$this->status->label = "Status";
$this->addType($this->status);
}
return $this;
}
}