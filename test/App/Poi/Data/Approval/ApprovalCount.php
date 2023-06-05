<?php
namespace Nemundo\ContentTest\App\Poi\Data\Approval;
class ApprovalCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ApprovalModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ApprovalModel();
}
}