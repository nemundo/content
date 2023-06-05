<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiLog;
class PoiLogDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var PoiLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PoiLogModel();
}
}