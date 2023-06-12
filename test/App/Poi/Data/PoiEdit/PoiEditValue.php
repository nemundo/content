<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiEdit;
class PoiEditValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var PoiEditModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PoiEditModel();
}
}