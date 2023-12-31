<?php
namespace Nemundo\Content\Index\Log\Data\ContentLog;
class ContentLogPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ContentLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentLogModel();
}
/**
* @return ContentLogRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new ContentLogRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}