<?php
namespace Nemundo\ContentTest\App\Poi\Data\Poi;
class PoiPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var PoiModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PoiModel();
}
/**
* @return PoiRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new PoiRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}