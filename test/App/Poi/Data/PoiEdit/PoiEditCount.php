<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiEdit;
class PoiEditCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var PoiEditModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PoiEditModel();
}
}