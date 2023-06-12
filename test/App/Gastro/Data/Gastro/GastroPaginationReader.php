<?php
namespace Nemundo\ContentTest\App\Gastro\Data\Gastro;
class GastroPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var GastroModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GastroModel();
}
/**
* @return GastroRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new GastroRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}