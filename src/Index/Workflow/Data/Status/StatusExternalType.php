<?php
namespace Nemundo\Content\Index\Workflow\Data\Status;
class StatusExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $status;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = StatusModel::class;
$this->externalTableName = "workflow_status";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->status = new \Nemundo\Model\Type\Text\TextType();
$this->status->fieldName = "status";
$this->status->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->status->externalTableName = $this->externalTableName;
$this->status->aliasFieldName = $this->status->tableName . "_" . $this->status->fieldName;
$this->status->label = "Status";
$this->addType($this->status);

}
}