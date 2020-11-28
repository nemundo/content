<?php
namespace Nemundo\Content\Index\Tree\Data\TreeIndex;
use Nemundo\Model\Data\AbstractModelUpdate;
class TreeIndexUpdate extends AbstractModelUpdate {
/**
* @var TreeIndexModel
*/
public $model;

/**
* @var string
*/
public $parentId;

/**
* @var string
*/
public $contentId;

/**
* @var string
*/
public $subject;

public function __construct() {
parent::__construct();
$this->model = new TreeIndexModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->parentId, $this->parentId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
parent::update();
}
}