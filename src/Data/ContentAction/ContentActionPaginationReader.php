<?php
namespace Nemundo\Content\Data\ContentAction;
class ContentActionPaginationReader extends \Nemundo\Model\Reader\AbstractPaginationModelDataReader {
/**
* @var ContentActionModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentActionModel();
}
/**
* @return \Nemundo\Content\Row\ActionCustomRow[]
*/
public function getData() {
$list = [];
foreach (parent::getData() as $dataRow) {
$row = new \Nemundo\Content\Row\ActionCustomRow($dataRow, $this->model);
$list[] = $row;
}
return $list;
}
}