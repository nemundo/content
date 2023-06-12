<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiErfassung;
class PoiErfassungPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var PoiErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PoiErfassungModel();
}
/**
* @return PoiErfassungRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new PoiErfassungRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}