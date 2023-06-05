<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiLog;
class PoiLogReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var PoiLogModel
*/
public $model;

public function __construct() {
$this->model = new PoiLogModel();
parent::__construct();
}
/**
* @return PoiLogRow[]
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
* @return PoiLogRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return PoiLogRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new PoiLogRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}