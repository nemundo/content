<?php
namespace Nemundo\Content\Index\Tree\Data\TreeIndex;
class TreeIndexValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var TreeIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TreeIndexModel();
}
}