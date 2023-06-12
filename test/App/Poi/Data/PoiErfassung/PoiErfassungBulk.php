<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiErfassung;
class PoiErfassungBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var PoiErfassungModel
*/
protected $model;

/**
* @var string
*/
public $poi;

public function __construct() {
parent::__construct();
$this->model = new PoiErfassungModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->poi, $this->poi);
$id = parent::save();
return $id;
}
}