<?php
namespace Nemundo\Content\Index\Log\Data\Status;
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
$this->tableName = "log_status";
$this->aliasTableName = "log_status";
$this->label = "Status";

$this->primaryIndex = new \Nemundo\Db\Index\NumberIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "log_status";
$this->id->externalTableName = "log_status";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "log_status_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->status = new \Nemundo\Model\Type\Text\TextType($this);
$this->status->tableName = "log_status";
$this->status->externalTableName = "log_status";
$this->status->fieldName = "status";
$this->status->aliasFieldName = "log_status_status";
$this->status->label = "Status";
$this->status->allowNullValue = false;
$this->status->length = 255;

}
}