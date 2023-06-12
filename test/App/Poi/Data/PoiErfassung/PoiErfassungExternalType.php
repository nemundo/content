<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiErfassung;
class PoiErfassungExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $poi;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = PoiErfassungModel::class;
$this->externalTableName = "poi_poi_erfassung";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->poi = new \Nemundo\Model\Type\Text\TextType();
$this->poi->fieldName = "poi";
$this->poi->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->poi->externalTableName = $this->externalTableName;
$this->poi->aliasFieldName = $this->poi->tableName . "_" . $this->poi->fieldName;
$this->poi->label = "Poi";
$this->addType($this->poi);

}
}