<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiEdit;
class PoiEditReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var PoiEditModel
*/
public $model;

public function __construct() {
$this->model = new PoiEditModel();
parent::__construct();
}
/**
* @return PoiEditRow[]
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
* @return PoiEditRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return PoiEditRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new PoiEditRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}