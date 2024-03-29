<?php
namespace Nemundo\Content\Index\Geo\Data\GeoContentType;
class GeoContentTypeReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var GeoContentTypeModel
*/
public $model;

public function __construct() {
$this->model = new GeoContentTypeModel();
parent::__construct();
}
/**
* @return GeoContentTypeRow[]
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
* @return GeoContentTypeRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return GeoContentTypeRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new GeoContentTypeRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}