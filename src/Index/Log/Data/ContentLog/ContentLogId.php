<?php
namespace Nemundo\Content\Index\Log\Data\ContentLog;
use Nemundo\Model\Id\AbstractModelIdValue;
class ContentLogId extends AbstractModelIdValue {
/**
* @var ContentLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ContentLogModel();
}
}