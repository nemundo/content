<?php
namespace Nemundo\Content\Data\ContentView;
class ContentViewBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ContentViewModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->contentTypeId, $this->contentTypeId);
$this->typeValueList->setModelValue($this->model->viewName, $this->viewName);
$this->typeValueList->setModelValue($this->model->viewClass, $this->viewClass);
$id = parent::save();
return $id;
}
}