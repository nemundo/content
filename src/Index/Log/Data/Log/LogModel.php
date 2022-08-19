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
}