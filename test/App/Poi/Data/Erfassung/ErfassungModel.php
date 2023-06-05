<?php
namespace Nemundo\ContentTest\App\Poi\Data\Erfassung;
class ErfassungModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

protected function loadModel() {
$this->tableName = "poi_erfassung";
$this->aliasTableName = "poi_erfassung";
$this->label = "Erfassung";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "poi_erfassung";
$this->id->externalTableName = "poi_erfassung";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "poi_erfassung_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

}
}