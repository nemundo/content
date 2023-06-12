<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiErfassung;
use Nemundo\Model\Data\AbstractModelUpdate;
class PoiErfassungUpdate extends AbstractModelUpdate {
/**
* @var PoiErfassungModel
*/
public $model;

/**
* @var string
*/
public $poi;

public function __construct() {
parent::__construct();
$this->model = new PoiErfassungModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->poi, $this->poi);
parent::update();
}
}