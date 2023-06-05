<?php
namespace Nemundo\ContentTest\App\Poi\Data\Approval;
class ApprovalValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ApprovalModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ApprovalModel();
}
}