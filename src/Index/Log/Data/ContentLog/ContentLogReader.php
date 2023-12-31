<?php
namespace Nemundo\Content\Index\Log\Data\ContentLog;
class ContentLogReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ContentLogModel
*/
public $model;

public function __construct() {
$this->model = new ContentLogModel();
parent::__construct();
}
/**
* @return ContentLogRow[]
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
* @return ContentLogRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ContentLogRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ContentLogRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}