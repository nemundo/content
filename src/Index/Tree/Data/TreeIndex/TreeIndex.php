<?php
namespace Nemundo\Content\Index\Tree\Data\TreeIndex;
class TreeIndex extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var TreeIndexModel
*/
protected $model;

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
public function save() {
$this->typeValueList->setModelValue($this->model->parentId, $this->parentId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->subject, $this->subject);
$id = parent::save();
return $id;
}
}