<?php
namespace Nemundo\Content\Index\Log\Data\Status;
use Nemundo\Model\Id\AbstractModelIdValue;
class StatusId extends AbstractModelIdValue {
/**
* @var StatusModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new StatusModel();
}
}