<?php
namespace Nemundo\Content\Index\Geo\Data\GeoIndex;
use Nemundo\Model\Data\AbstractModelUpdate;
class GeoIndexUpdate extends AbstractModelUpdate {
/**
* @var GeoIndexModel
*/
public $model;

/**
* @var \Nemundo\Core\Type\Geo\GeoCoordinate
*/
public $geoCoordinate;

/**
* @var string
*/
public $place;

/**
* @var string
*/
public $contentId;

/**
* @var string
*/
public $description;

/**
* @var string
*/
public $imageUrl;

public function __construct() {
parent::__construct();
$this->model = new GeoIndexModel();
$this->geoCoordinate = new \Nemundo\Core\Type\Geo\GeoCoordinate();
}
public function update() {
if ($this-> geoCoordinate->hasValue()) {
$property = new \Nemundo\Model\Data\Property\Geo\GeoCoordinateDataProperty($this->model->geoCoordinate, $this->typeValueList);
$property->setValue($this->geoCoordinate);
}
$this->typeValueList->setModelValue($this->model->place, $this->place);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->description, $this->description);
$this->typeValueList->setModelValue($this->model->imageUrl, $this->imageUrl);
parent::update();
}
}