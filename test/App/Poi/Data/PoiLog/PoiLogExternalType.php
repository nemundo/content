<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiLog;
class PoiLogExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $poiOld;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $poiNew;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $poiHasChanged;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $descriptionHasChanged;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $descriptionOld;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $descriptionNew;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = PoiLogModel::class;
$this->externalTableName = "poi_poi_log";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->poiOld = new \Nemundo\Model\Type\Text\TextType();
$this->poiOld->fieldName = "poi_old";
$this->poiOld->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->poiOld->externalTableName = $this->externalTableName;
$this->poiOld->aliasFieldName = $this->poiOld->tableName . "_" . $this->poiOld->fieldName;
$this->poiOld->label = "Poi old";
$this->addType($this->poiOld);

$this->poiNew = new \Nemundo\Model\Type\Text\TextType();
$this->poiNew->fieldName = "poi_new";
$this->poiNew->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->poiNew->externalTableName = $this->externalTableName;
$this->poiNew->aliasFieldName = $this->poiNew->tableName . "_" . $this->poiNew->fieldName;
$this->poiNew->label = "Poi new";
$this->addType($this->poiNew);

$this->poiHasChanged = new \Nemundo\Model\Type\Number\YesNoType();
$this->poiHasChanged->fieldName = "poi_has_changed";
$this->poiHasChanged->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->poiHasChanged->externalTableName = $this->externalTableName;
$this->poiHasChanged->aliasFieldName = $this->poiHasChanged->tableName . "_" . $this->poiHasChanged->fieldName;
$this->poiHasChanged->label = "Poi has Changed";
$this->addType($this->poiHasChanged);

$this->descriptionHasChanged = new \Nemundo\Model\Type\Number\YesNoType();
$this->descriptionHasChanged->fieldName = "description_has_changed";
$this->descriptionHasChanged->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->descriptionHasChanged->externalTableName = $this->externalTableName;
$this->descriptionHasChanged->aliasFieldName = $this->descriptionHasChanged->tableName . "_" . $this->descriptionHasChanged->fieldName;
$this->descriptionHasChanged->label = "Description has Changed";
$this->addType($this->descriptionHasChanged);

$this->descriptionOld = new \Nemundo\Model\Type\Text\LargeTextType();
$this->descriptionOld->fieldName = "description_old";
$this->descriptionOld->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->descriptionOld->externalTableName = $this->externalTableName;
$this->descriptionOld->aliasFieldName = $this->descriptionOld->tableName . "_" . $this->descriptionOld->fieldName;
$this->descriptionOld->label = "Description Old";
$this->addType($this->descriptionOld);

$this->descriptionNew = new \Nemundo\Model\Type\Text\LargeTextType();
$this->descriptionNew->fieldName = "description_new";
$this->descriptionNew->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->descriptionNew->externalTableName = $this->externalTableName;
$this->descriptionNew->aliasFieldName = $this->descriptionNew->tableName . "_" . $this->descriptionNew->fieldName;
$this->descriptionNew->label = "Description New";
$this->addType($this->descriptionNew);

}
}