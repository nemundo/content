<?php
namespace Nemundo\Content\Data\ContentAction;
class ContentActionBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ContentActionModel
*/
protected $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $action;

/**
* @var string
*/
public $phpClass;

/**
* @var bool
*/
public $menuActive;

/**
* @var bool
*/
public $setupStatus;

public function __construct() {
parent::__construct();
$this->model = new ContentActionModel();
}
public function save() {
$id = $this->id;
$this->typeValueList->setModelValue($this->model->id, $id);
$this->typeValueList->setModelValue($this->model->action, $this->action);
$this->typeValueList->setModelValue($this->model->phpClass, $this->phpClass);
$this->typeValueList->setModelValue($this->model->menuActive, $this->menuActive);
$this->typeValueList->setModelValue($this->model->setupStatus, $this->setupStatus);
$id = parent::save();
return $id;
}
}