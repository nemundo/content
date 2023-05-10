<?php
namespace Nemundo\ContentTest\App\Poi\Data\Poi;
class PoiModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $poi;

/**
* @var \Nemundo\Model\Type\Geo\GeoCoordinateType
*/
public $geoCoordinate;

protected function loadModel() {
$this->tableName = "poi_poi";
$this->aliasTableName = "poi_poi";
$this->label = "Poi";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "poi_poi";
$this->id->externalTableName = "poi_poi";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "poi_poi_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->poi = new \Nemundo\Model\Type\Text\TextType($this);
$this->poi->tableName = "poi_poi";
$this->poi->externalTableName = "poi_poi";
$this->poi->fieldName = "poi";
$this->poi->aliasFieldName = "poi_poi_poi";
$this->poi->label = "Poi";
$this->poi->allowNullValue = false;
$this->poi->length = 255;

$this->geoCoordinate = new \Nemundo\Model\Type\Geo\GeoCoordinateType($this);
$this->geoCoordinate->tableName = "poi_poi";
$this->geoCoordinate->externalTableName = "poi_poi";
$this->geoCoordinate->fieldName = "geo_coordinate";
$this->geoCoordinate->aliasFieldName = "poi_poi_geo_coordinate";
$this->geoCoordinate->label = "Geo Coordinate";
$this->geoCoordinate->allowNullValue = false;

}
}