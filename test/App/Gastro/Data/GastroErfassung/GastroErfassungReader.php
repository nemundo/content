<?php
namespace Nemundo\ContentTest\App\Gastro\Data\GastroErfassung;
class GastroErfassungReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var GastroErfassungModel
*/
public $model;

public function __construct() {
$this->model = new GastroErfassungModel();
parent::__construct();
}
/**
* @return GastroErfassungRow[]
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
* @return GastroErfassungRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return GastroErfassungRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new GastroErfassungRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}