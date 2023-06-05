<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiLog;
class PoiLogCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var PoiLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PoiLogModel();
}
}