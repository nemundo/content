<?php
namespace Nemundo\ContentTest\App\Poi\Data\Erfassung;
class ErfassungPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ErfassungModel();
}
/**
* @return ErfassungRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ErfassungRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}