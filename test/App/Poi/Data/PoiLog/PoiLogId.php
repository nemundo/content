<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiLog;
use Nemundo\Model\Id\AbstractModelIdValue;
class PoiLogId extends AbstractModelIdValue {
/**
* @var PoiLogModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PoiLogModel();
}
}