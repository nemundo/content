<?php
namespace Nemundo\Content\Index\Workflow\Data\WorkflowLog;
class WorkflowLogReader extends \Nemundo\Model\Reader\ModelDataReader {
/**
* @var WorkflowLogModel
*/
public $model;

public function __construct() {
$this->model = new WorkflowLogModel();
parent::__construct();
}
/**
* @return WorkflowLogRow[]
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
* @return WorkflowLogRow
*/
public function getRow() {
$dataRow = parent::getRow();
$row = $this->getModelRow($dataRow);
return $row;
}
/**
* @return WorkflowLogRow
*/
public function getRowById($id) {
return parent::getRowById($id);
}
private function getModelRow($dataRow) {
$row = new WorkflowLogRow($dataRow, $this->model);
$row->model = $this->model;
return $row;
}
}