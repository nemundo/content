<?php
namespace Nemundo\Content\Index\Workflow\Data\Notification;
class NotificationCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var NotificationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NotificationModel();
}
}