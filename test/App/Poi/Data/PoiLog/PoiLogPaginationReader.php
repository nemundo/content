<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiLog;
class PoiLogPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var PoiLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PoiLogModel();
}
/**
* @return PoiLogRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new PoiLogRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}