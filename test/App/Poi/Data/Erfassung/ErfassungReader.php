<?php
namespace Nemundo\ContentTest\App\Poi\Data\Erfassung;
class ErfassungReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ErfassungModel
*/
public $model;

public function __construct() {
$this->model = new ErfassungModel();
parent::__construct();
}
/**
* @return ErfassungRow[]
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
* @return ErfassungRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ErfassungRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ErfassungRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}