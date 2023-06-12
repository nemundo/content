<?php
namespace Nemundo\ContentTest\App\Gastro\Data\GastroErfassung;
class GastroErfassungPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var GastroErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GastroErfassungModel();
}
/**
* @return GastroErfassungRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new GastroErfassungRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}