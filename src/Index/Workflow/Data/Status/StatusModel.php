<?php
namespace Nemundo\Content\Index\Workflow\Data\Status;
class StatusModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $status;

protected function loadModel() {
$this->tableName = "workflow_status";
$this->aliasTableName = "workflow_status";
$this->label = "Status";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_status";
$this->id->externalTableName = "workflow_status";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_status_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->status = new \Nemundo\Model\Type\Text\TextType($this);
$this->status->tableName = "workflow_status";
$this->status->externalTableName = "workflow_status";
$this->status->fieldName = "status";
$this->status->aliasFieldName = "workflow_status_status";
$this->status->label = "Status";
$this->status->allowNullValue = false;
$this->status->length = 255;

}
}