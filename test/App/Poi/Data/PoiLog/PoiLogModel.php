<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiLog;
class PoiLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
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

protected function loadModel() {
$this->tableName = "poi_poi_log";
$this->aliasTableName = "poi_poi_log";
$this->label = "Poi Log";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "poi_poi_log";
$this->id->externalTableName = "poi_poi_log";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "poi_poi_log_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->poiOld = new \Nemundo\Model\Type\Text\TextType($this);
$this->poiOld->tableName = "poi_poi_log";
$this->poiOld->externalTableName = "poi_poi_log";
$this->poiOld->fieldName = "poi_old";
$this->poiOld->aliasFieldName = "poi_poi_log_poi_old";
$this->poiOld->label = "Poi old";
$this->poiOld->allowNullValue = false;
$this->poiOld->length = 255;

$this->poiNew = new \Nemundo\Model\Type\Text\TextType($this);
$this->poiNew->tableName = "poi_poi_log";
$this->poiNew->externalTableName = "poi_poi_log";
$this->poiNew->fieldName = "poi_new";
$this->poiNew->aliasFieldName = "poi_poi_log_poi_new";
$this->poiNew->label = "Poi new";
$this->poiNew->allowNullValue = false;
$this->poiNew->length = 255;

$this->poiHasChanged = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->poiHasChanged->tableName = "poi_poi_log";
$this->poiHasChanged->externalTableName = "poi_poi_log";
$this->poiHasChanged->fieldName = "poi_has_changed";
$this->poiHasChanged->aliasFieldName = "poi_poi_log_poi_has_changed";
$this->poiHasChanged->label = "Poi has Changed";
$this->poiHasChanged->allowNullValue = false;

$this->descriptionHasChanged = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->descriptionHasChanged->tableName = "poi_poi_log";
$this->descriptionHasChanged->externalTableName = "poi_poi_log";
$this->descriptionHasChanged->fieldName = "description_has_changed";
$this->descriptionHasChanged->aliasFieldName = "poi_poi_log_description_has_changed";
$this->descriptionHasChanged->label = "Description has Changed";
$this->descriptionHasChanged->allowNullValue = false;

$this->descriptionOld = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->descriptionOld->tableName = "poi_poi_log";
$this->descriptionOld->externalTableName = "poi_poi_log";
$this->descriptionOld->fieldName = "description_old";
$this->descriptionOld->aliasFieldName = "poi_poi_log_description_old";
$this->descriptionOld->label = "Description Old";
$this->descriptionOld->allowNullValue = false;

$this->descriptionNew = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->descriptionNew->tableName = "poi_poi_log";
$this->descriptionNew->externalTableName = "poi_poi_log";
$this->descriptionNew->fieldName = "description_new";
$this->descriptionNew->aliasFieldName = "poi_poi_log_description_new";
$this->descriptionNew->label = "Description New";
$this->descriptionNew->allowNullValue = false;

}
}