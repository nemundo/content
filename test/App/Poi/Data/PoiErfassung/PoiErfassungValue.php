<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiErfassung;
class PoiErfassungValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var PoiErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PoiErfassungModel();
}
}