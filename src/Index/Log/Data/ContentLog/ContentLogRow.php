<?php
namespace Nemundo\Content\Index\Log\Data\ContentLog;
class ContentLogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ContentLogModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $statusId;

/**
* @var \Nemundo\Content\Index\Log\Data\Status\StatusRow
*/
public $status;

/**
* @var string
*/
public $userCreatedId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $userCreated;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTimeCreated;

/**
* @var string
*/
public $userLastChangeId;

/**
* @var \Nemundo\User\Reader\User\UserDataRow
*/
public $userLastChange;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTimeLastChange;

/**
* @var int
*/
public $contentId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $content;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->statusId = intval($this->getModelValue($model->statusId));
if ($model->status !== null) {
$this->loadNemundoContentIndexLogDataStatusStatusstatusRow($model->status);
}
$this->userCreatedId = $this->getModelValue($model->userCreatedId);
if ($model->userCreated !== null) {
$this->loadNemundoUserDataUserUseruserCreatedRow($model->userCreated);
}
$this->dateTimeCreated = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTimeCreated));
$this->userLastChangeId = $this->getModelValue($model->userLastChangeId);
if ($model->userLastChange !== null) {
$this->loadNemundoUserDataUserUseruserLastChangeRow($model->userLastChange);
}
$this->dateTimeLastChange = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTimeLastChange));
$this->contentId = intval($this->getModelValue($model->contentId));
if ($model->content !== null) {
$this->loadNemundoContentDataContentContentcontentRow($model->content);
}
}
private function loadNemundoContentIndexLogDataStatusStatusstatusRow($model) {
$this->status = new \Nemundo\Content\Index\Log\Data\Status\StatusRow($this->row, $model);
}
private function loadNemundoUserDataUserUseruserCreatedRow($model) {
$this->userCreated = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
private function loadNemundoUserDataUserUseruserLastChangeRow($model) {
$this->userLastChange = new \Nemundo\User\Reader\User\UserDataRow($this->row, $model);
}
private function loadNemundoContentDataContentContentcontentRow($model) {
$this->content = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
}