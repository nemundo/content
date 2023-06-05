<?php
namespace Nemundo\ContentTest\App\Poi\Data\Approval;
use Nemundo\Model\Data\AbstractModelUpdate;
class ApprovalUpdate extends AbstractModelUpdate {
/**
* @var ApprovalModel
*/
public $model;

/**
* @var string
*/
public $kommentar;

public function __construct() {
parent::__construct();
$this->model = new ApprovalModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->kommentar, $this->kommentar);
parent::update();
}
}