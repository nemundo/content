<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiEdit;
class PoiEditModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

protected function loadModel() {
$this->tableName = "poi_poi_edit";
$this->aliasTableName = "poi_poi_edit";
$this->label = "Poi Edit";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "poi_poi_edit";
$this->id->externalTableName = "poi_poi_edit";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "poi_poi_edit_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

}
}