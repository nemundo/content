<?php
namespace Nemundo\Content\Index\Workflow\Data\Process;
class ProcessModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType
*/
public $contentTypeId;

/**
* @var \Nemundo\Content\Data\ContentType\ContentTypeExternalType
*/
public $contentType;

protected function loadModel() {
$this->tableName = "workflow_process";
$this->aliasTableName = "workflow_process";
$this->label = "Process";

$this->primaryIndex = new \Nemundo\Db\Index\UniqueIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "workflow_process";
$this->id->externalTableName = "workflow_process";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "workflow_process_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->contentTypeId = new \Nemundo\Model\Type\External\Id\UniqueIdExternalIdType($this);
$this->contentTypeId->tableName = "workflow_process";
$this->contentTypeId->fieldName = "content_type";
$this->contentTypeId->aliasFieldName = "workflow_process_content_type";
$this->contentTypeId->label = "Content Type";
$this->contentTypeId->allowNullValue = false;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "content_type";
$index->addType($this->contentTypeId);

}
public function loadContentType() {
if ($this->contentType == null) {
$this->contentType = new \Nemundo\Content\Data\ContentType\ContentTypeExternalType($this, "workflow_process_content_type");
$this->contentType->tableName = "workflow_process";
$this->contentType->fieldName = "content_type";
$this->contentType->aliasFieldName = "workflow_process_content_type";
$this->contentType->label = "Content Type";
}
return $this;
}
}