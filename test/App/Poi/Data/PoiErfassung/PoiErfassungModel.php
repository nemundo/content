<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiErfassung;
class PoiErfassungModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $poi;

protected function loadModel() {
$this->tableName = "poi_poi_erfassung";
$this->aliasTableName = "poi_poi_erfassung";
$this->label = "Poi Erfassung";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "poi_poi_erfassung";
$this->id->externalTableName = "poi_poi_erfassung";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "poi_poi_erfassung_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->poi = new \Nemundo\Model\Type\Text\TextType($this);
$this->poi->tableName = "poi_poi_erfassung";
$this->poi->externalTableName = "poi_poi_erfassung";
$this->poi->fieldName = "poi";
$this->poi->aliasFieldName = "poi_poi_erfassung_poi";
$this->poi->label = "Poi";
$this->poi->allowNullValue = false;
$this->poi->length = 255;

}
}