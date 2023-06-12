<?php
namespace Nemundo\Content\Index\Workflow\Data\Notification;
class NotificationRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var NotificationModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $workflowStatusId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $workflowStatus;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $user;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->workflowStatusId = intval($this->getModelValue($model->workflowStatusId));
if ($model->workflowStatus !== null) {
$this->loadNemundoContentDataContentContentworkflowStatusRow($model->workflowStatus);
}
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
}
private function loadNemundoContentDataContentContentworkflowStatusRow($model) {
$this->workflowStatus = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
}