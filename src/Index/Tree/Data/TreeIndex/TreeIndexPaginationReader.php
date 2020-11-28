<?php
namespace Nemundo\Content\Index\Tree\Data\TreeIndex;
class TreeIndexPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var TreeIndexModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new TreeIndexModel();
}
/**
* @return TreeIndexRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new TreeIndexRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}