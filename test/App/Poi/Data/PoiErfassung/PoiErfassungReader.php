<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiErfassung;
class PoiErfassungReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var PoiErfassungModel
*/
public $model;

public function __construct() {
$this->model = new PoiErfassungModel();
parent::__construct();
}
/**
* @return PoiErfassungRow[]
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
* @return PoiErfassungRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return PoiErfassungRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new PoiErfassungRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}