<?php
namespace Nemundo\ContentTest\App\Poi\Data\Poi;
class PoiReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var PoiModel
*/
public $model;

public function __construct() {
$this->model = new PoiModel();
parent::__construct();
}
/**
* @return PoiRow[]
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
* @return PoiRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return PoiRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new PoiRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}