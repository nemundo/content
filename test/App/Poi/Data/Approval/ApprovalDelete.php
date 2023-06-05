<?php
namespace Nemundo\ContentTest\App\Poi\Data\Approval;
class ApprovalDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ApprovalModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ApprovalModel();
}
}