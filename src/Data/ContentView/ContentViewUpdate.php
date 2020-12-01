<?php
namespace Nemundo\Content\Data\ContentView;
use Nemundo\Model\Data\AbstractModelUpdate;
class ContentViewUpdate extends AbstractModelUpdate {
/**
* @var ContentViewModel
*/
public $model;

/**
* @var string
*/
public $contentTypeId;

/**
* @var string
*/
public $viewName;

/**
* @var string
*/
public $viewClass;

public function __construct() {
parent::__construct();
$this->model = new ContentViewModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->viewName, $this->viewName);
$this->typeValueList->setModelValue($this->model->viewClass, $this->viewClass);
parent::update();
}
}