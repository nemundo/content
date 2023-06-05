<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiLog;
class PoiLogExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Id\IdType
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = PoiLogModel::class;
$this->externalTableName = "poi_poi_log";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->contentLogId = new \Nemundo\Model\Type\Id\IdType();
$this->contentLogId->fieldName = "content_log";
$this->contentLogId->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentLogId->aliasFieldName = $this->contentLogId->tableName ."_".$this->contentLogId->fieldName;
$this->contentLogId->label = "Content Log";
$this->addType($this->contentLogId);

$this->poiOld = new \Nemundo\Model\Type\Text\TextType();
$this->poiOld->fieldName = "poi_old";
$this->poiOld->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->poiOld->externalTableName = $this->externalTableName;
$this->poiOld->aliasFieldName = $this->poiOld->tableName . "_" . $this->poiOld->fieldName;
$this->poiOld->label = "Poi old";
$this->addType($this->poiOld);

$this->poiNew = new \Nemundo\Model\Type\Text\TextType();
$this->poiNew->fieldName = "poi_new";
$this->poiNew->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->poiNew->externalTableName = $this->externalTableName;
$this->poiNew->aliasFieldName = $this->poiNew->tableName . "_" . $this->poiNew->fieldName;
$this->poiNew->label = "Poi new";
$this->addType($this->poiNew);

}
public function loadContentLog() {
if ($this->contentLog == null) {
$this->contentLog = new \Nemundo\Content\Index\Log\Data\Log\LogExternalType(null, $this->parentFieldName . "_content_log");
$this->contentLog->fieldName = "content_log";
$this->contentLog->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->contentLog->aliasFieldName = $this->contentLog->tableName ."_".$this->contentLog->fieldName;
$this->contentLog->label = "Content Log";
$this->addType($this->contentLog);
}
return $this;
}
}