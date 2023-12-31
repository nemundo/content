<?php
namespace Nemundo\Content\Index\Log\Data\ContentLog;
class ContentLogDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ContentLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentLogModel();
}
}