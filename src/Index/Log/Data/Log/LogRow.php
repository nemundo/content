<?php
namespace Nemundo\Content\Index\Log\Data\Log;
class LogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var LogModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $user;

/**
* @var int
*/
public $contentId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $content;

/**
* @var bool
*/
public $create;

/**
* @var int
*/
public $logDataId;

/**
* @var bool
*/
public $statusChange;

/**
* @var int
*/
public $statusId;

/**
* @var \Nemundo\Content\Index\Log\Data\Status\StatusRow
*/
public $status;

/**
* @var bool
*/
public $hasLogData;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
$this->contentId = intval($this->getModelValue($model->contentId));
if ($model->content !== null) {
$this->loadNemundoContentDataContentContentcontentRow($model->content);
}
$this->create = boolval($this->getModelValue($model->create));
$this->logDataId = intval($this->getModelValue($model->logDataId));
$this->statusChange = boolval($this->getModelValue($model->statusChange));
$this->statusId = intval($this->getModelValue($model->statusId));
if ($model->status !== null) {
$this->loadNemundoContentIndexLogDataStatusStatusstatusRow($model->status);
}
$this->hasLogData = boolval($this->getModelValue($model->hasLogData));
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
private function loadNemundoContentDataContentContentcontentRow($model) {
$this->content = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
private function loadNemundoContentIndexLogDataStatusStatusstatusRow($model) {
$this->status = new \Nemundo\Content\Index\Log\Data\Status\StatusRow($this->row, $model);
}
}