<?php
namespace Nemundo\Content\Index\Workflow\Data\Status;
class Status extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var StatusModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $status;

public function __construct() {
parent::__construct();
$this->model = new StatusModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->status, $this->status);
$id = parent::save();
return $id;
}
}