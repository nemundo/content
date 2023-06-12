<?php
namespace Nemundo\Content\Index\Workflow\Data\Notification;
class NotificationBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var NotificationModel
*/
protected $model;

/**
* @var string
*/
public $workflowStatusId;

/**
* @var string
*/
public $userId;

public function __construct() {
parent::__construct();
$this->model = new NotificationModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->workflowStatusId, $this->workflowStatusId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
$id = parent::save();
return $id;
}
}