<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiLog;
class PoiLogValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var PoiLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PoiLogModel();
}
}