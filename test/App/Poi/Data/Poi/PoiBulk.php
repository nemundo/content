<?php
namespace Nemundo\ContentTest\App\Poi\Data\Poi;
class PoiBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var PoiModel
*/
protected $model;

/**
* @var string
*/
public $poi;

/**
* @var \Nemundo\Core\Type\Geo\GeoCoordinate
*/
public $geoCoordinate;

public function __construct() {
parent::__construct();
$this->model = new PoiModel();
$this->geoCoordinate = new \Nemundo\Core\Type\Geo\GeoCoordinate();
}
public function save() {
$this->typeValueList->setModelValue($this->model->poi, $this->poi);
if ($this-> geoCoordinate->hasValue()) {
$property = new \Nemundo\Model\Data\Property\Geo\GeoCoordinateDataProperty($this->model->geoCoordinate, $this->typeValueList);
$property->setValue($this->geoCoordinate);
}
$id = parent::save();
return $id;
}
}