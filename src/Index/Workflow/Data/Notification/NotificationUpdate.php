<?php
namespace Nemundo\Content\Index\Workflow\Data\Notification;
use Nemundo\Model\Data\AbstractModelUpdate;
class NotificationUpdate extends AbstractModelUpdate {
/**
* @var NotificationModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->workflowStatusId, $this->workflowStatusId);
$this->typeValueList->setModelValue($this->model->userId, $this->userId);
parent::update();
}
}