<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiEdit;
class PoiEditPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var PoiEditModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PoiEditModel();
}
/**
* @return PoiEditRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new PoiEditRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}