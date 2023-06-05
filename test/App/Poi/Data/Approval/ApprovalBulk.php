<?php
namespace Nemundo\ContentTest\App\Poi\Data\Approval;
class ApprovalBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var ApprovalModel
*/
protected $model;

/**
* @var string
*/
public $kommentar;

public function __construct() {
parent::__construct();
$this->model = new ApprovalModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->kommentar, $this->kommentar);
$id = parent::save();
return $id;
}
}