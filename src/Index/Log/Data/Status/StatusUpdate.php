<?php
namespace Nemundo\Content\Index\Log\Data\Status;
use Nemundo\Model\Data\AbstractModelUpdate;
class StatusUpdate extends AbstractModelUpdate {
/**
* @var StatusModel
*/
public $model;

/**
* @var string
*/
public $status;

public function __construct() {
parent::__construct();
$this->model = new StatusModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->status, $this->status);
parent::update();
}
}