<?php
namespace Nemundo\Content\Data\ContentAction;
class ContentActionRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var ContentActionModel
*/
public $model;

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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->action = $this->getModelValue($model->action);
$this->phpClass = $this->getModelValue($model->phpClass);
$this->menuActive = boolval($this->getModelValue($model->menuActive));
$this->setupStatus = boolval($this->getModelValue($model->setupStatus));
}
}