<?php
namespace Nemundo\ContentTest\App\Poi\Data\Approval;
class ApprovalExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $kommentar;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ApprovalModel::class;
$this->externalTableName = "poi_approval";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->kommentar = new \Nemundo\Model\Type\Text\LargeTextType();
$this->kommentar->fieldName = "kommentar";
$this->kommentar->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->kommentar->externalTableName = $this->externalTableName;
$this->kommentar->aliasFieldName = $this->kommentar->tableName . "_" . $this->kommentar->fieldName;
$this->kommentar->label = "Kommentar";
$this->addType($this->kommentar);

}
}