<?php
namespace Nemundo\ContentTest\App\Poi\Data\Approval;
class ApprovalModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $kommentar;

protected function loadModel() {
$this->tableName = "poi_approval";
$this->aliasTableName = "poi_approval";
$this->label = "Approval";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "poi_approval";
$this->id->externalTableName = "poi_approval";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "poi_approval_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->kommentar = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->kommentar->tableName = "poi_approval";
$this->kommentar->externalTableName = "poi_approval";
$this->kommentar->fieldName = "kommentar";
$this->kommentar->aliasFieldName = "poi_approval_kommentar";
$this->kommentar->label = "Kommentar";
$this->kommentar->allowNullValue = false;

}
}