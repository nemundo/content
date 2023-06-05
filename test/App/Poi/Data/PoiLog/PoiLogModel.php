<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiLog;
class PoiLogModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $contentLogId;

/**
* @var \Nemundo\Content\Index\Log\Data\Log\LogExternalType
*/
public $contentLog;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $poiOld;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $poiNew;

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

$this->contentLogId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->contentLogId->tableName = "poi_poi_log";
$this->contentLogId->fieldName = "content_log";
$this->contentLogId->aliasFieldName = "poi_poi_log_content_log";
$this->contentLogId->label = "Content Log";
$this->contentLogId->allowNullValue = false;

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

}
public function loadContentLog() {
if ($this->contentLog == null) {
$this->contentLog = new \Nemundo\Content\Index\Log\Data\Log\LogExternalType($this, "poi_poi_log_content_log");
$this->contentLog->tableName = "poi_poi_log";
$this->contentLog->fieldName = "content_log";
$this->contentLog->aliasFieldName = "poi_poi_log_content_log";
$this->contentLog->label = "Content Log";
}
return $this;
}
}