<?php
namespace Nemundo\Content\Index\Log\Data\ContentLog;
class ContentLogCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ContentLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentLogModel();
}
}