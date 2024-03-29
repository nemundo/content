<?php
namespace Nemundo\Content\Index\Log\Data\Status;
class StatusReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var StatusModel
*/
public $model;

public function __construct() {
$this->model = new StatusModel();
parent::__construct();
}
/**
* @return StatusRow[]
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
* @return StatusRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return StatusRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new StatusRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}