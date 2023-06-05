<?php
namespace Nemundo\ContentTest\App\Poi\Data\Approval;
use Nemundo\Model\Id\AbstractModelIdValue;
class ApprovalId extends AbstractModelIdValue {
/**
* @var ApprovalModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ApprovalModel();
}
}