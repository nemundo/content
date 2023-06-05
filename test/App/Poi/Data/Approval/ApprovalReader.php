<?php
namespace Nemundo\ContentTest\App\Poi\Data\Approval;
class ApprovalReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var ApprovalModel
*/
public $model;

public function __construct() {
$this->model = new ApprovalModel();
parent::__construct();
}
/**
* @return ApprovalRow[]
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
* @return ApprovalRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return ApprovalRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new ApprovalRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}