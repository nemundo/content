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
* @var string
*/
public $message;

public function __construct() {
parent::__construct();
$this->model = new LogModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->message, $this->message);
parent::update();
}
}