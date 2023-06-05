<?php
namespace Nemundo\ContentTest\App\Poi\Data\Approval;
class ApprovalPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ApprovalModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ApprovalModel();
}
/**
* @return ApprovalRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ApprovalRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}