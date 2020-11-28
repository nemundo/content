<?php
namespace Nemundo\Content\Index\Tree\Data\TreeIndex;
class TreeIndexCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var TreeIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TreeIndexModel();
}
}