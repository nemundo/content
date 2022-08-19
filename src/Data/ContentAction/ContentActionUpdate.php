<?php
namespace Nemundo\Content\Data\ContentAction;
use Nemundo\Model\Data\AbstractModelUpdate;
class ContentActionUpdate extends AbstractModelUpdate {
/**
* @var ContentActionModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->action, $this->action);
$this->typeValueList->setModelValue($this->model->phpClass, $this->phpClass);
$this->typeValueList->setModelValue($this->model->menuActive, $this->menuActive);
$this->typeValueList->setModelValue($this->model->setupStatus, $this->setupStatus);
parent::update();
}
}