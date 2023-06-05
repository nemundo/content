<?php
namespace Nemundo\Content\Index\Workflow\Data\Process;
class ProcessReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ProcessModel
*/
public $model;

public function __construct() {
$this->model = new ProcessModel();
parent::__construct();
}
/**
* @return ProcessRow[]
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
* @return ProcessRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ProcessRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ProcessRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}