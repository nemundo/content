<?php
namespace Nemundo\Content\Index\Workflow\Data\Notification;
use Nemundo\Model\Id\AbstractModelIdValue;
class NotificationId extends AbstractModelIdValue {
/**
* @var NotificationModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new NotificationModel();
}
}