<?php
namespace Nemundo\ContentTest\App\Poi\Data\Poi;
use Nemundo\Model\Data\AbstractModelUpdate;
class PoiUpdate extends AbstractModelUpdate {
/**
* @var PoiModel
*/
public $model;

/**
* @var string
*/
public $poi;

/**
* @var \Nemundo\Core\Type\Geo\GeoCoordinate
*/
public $geoCoordinate;

/**
* @var string
*/
public $description;

/**
* @var string
*/
public $statusId;

public function __construct() {
parent::__construct();
$this->model = new PoiModel();
$this->geoCoordinate = new \Nemundo\Core\Type\Geo\GeoCoordinate();
}
public function update() {
$this->typeValueList->setModelValue($this->model->poi, $this->poi);
if ($this-> geoCoordinate->hasValue()) {
$property = new \Nemundo\Model\Data\Property\Geo\GeoCoordinateDataProperty($this->model->geoCoordinate, $this->typeValueList);
$property->setValue($this->geoCoordinate);
}
$this->typeValueList->setModelValue($this->model->description, $this->description);
$this->typeValueList->setModelValue($this->model->statusId, $this->statusId);
parent::update();
}
}