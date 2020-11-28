<?php
namespace Nemundo\Content\Index\Tree\Data\TreeIndex;
use Nemundo\Model\Id\AbstractModelIdValue;
class TreeIndexId extends AbstractModelIdValue {
/**
* @var TreeIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TreeIndexModel();
}
}