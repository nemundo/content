<?php
namespace Nemundo\Content\Data\ContentAction;
class ContentActionReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ContentActionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentActionModel();
}
/**
* @return \Nemundo\Content\Row\ActionCustomRow[]
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
* @return \Nemundo\Content\Row\ActionCustomRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return \Nemundo\Content\Row\ActionCustomRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new \Nemundo\Content\Row\ActionCustomRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}