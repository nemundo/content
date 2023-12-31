<?php
namespace Nemundo\Content\Index\Log\Data\ContentLog;
class ContentLogValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ContentLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentLogModel();
}
}