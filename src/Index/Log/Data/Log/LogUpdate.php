<?php
namespace Nemundo\Content\Index\Log\Data\Log;
use Nemundo\Model\Data\AbstractModelUpdate;
class LogUpdate extends AbstractModelUpdate {
/**
* @var LogModel
*/
public $model;

/**
* @var string
*/
public $contentId;

/**
* @var bool
*/
public $create;

/**
* @var int
*/
public $logDataId;

/**
* @var bool
*/
public $statusChange;

/**
* @var string
*/
public $statusId;

/**
* @var bool
*/
public $hasLogData;

public function __construct() {
parent::__construct();
$this->model = new LogModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->create, $this->create);
$this->typeValueList->setModelValue($this->model->logDataId, $this->logDataId);
$this->typeValueList->setModelValue($this->model->statusChange, $this->statusChange);
$this->typeValueList->setModelValue($this->model->statusId, $this->statusId);
$this->typeValueList->setModelValue($this->model->hasLogData, $this->hasLogData);
parent::update();
}
}