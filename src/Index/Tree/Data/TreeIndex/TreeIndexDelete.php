<?php
namespace Nemundo\Content\Index\Tree\Data\TreeIndex;
class TreeIndexDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var TreeIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TreeIndexModel();
}
}