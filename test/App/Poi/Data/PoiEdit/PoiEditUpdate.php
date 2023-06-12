<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiEdit;
use Nemundo\Model\Data\AbstractModelUpdate;
class PoiEditUpdate extends AbstractModelUpdate {
/**
* @var PoiEditModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PoiEditModel();
}
public function update() {
parent::update();
}
}