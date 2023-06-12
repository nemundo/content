<?php
namespace Nemundo\ContentTest\App\Gastro\Data\Gastro;
class GastroReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var GastroModel
*/
public $model;

public function __construct() {
$this->model = new GastroModel();
parent::__construct();
}
/**
* @return GastroRow[]
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
* @return GastroRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return GastroRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new GastroRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}