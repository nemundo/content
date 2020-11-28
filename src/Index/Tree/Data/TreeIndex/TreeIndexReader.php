<?php
namespace Nemundo\Content\Index\Tree\Data\TreeIndex;
class TreeIndexReader extends \Nemundo\Model\Reader\ModelDataReader {
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
$row = $this->getModelRow($dataRow);
$list[] = $row;
}
return $list;
}
/**
* @return TreeIndexRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return TreeIndexRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new TreeIndexRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}