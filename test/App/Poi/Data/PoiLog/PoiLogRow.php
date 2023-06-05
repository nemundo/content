<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiLog;
class PoiLogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var PoiLogModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $contentLogId;

/**
* @var \Nemundo\Content\Index\Log\Data\Log\LogRow
*/
public $contentLog;

/**
* @var string
*/
public $poiOld;

/**
* @var string
*/
public $poiNew;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->contentLogId = intval($this->getModelValue($model->contentLogId));
if ($model->contentLog !== null) {
$this->loadNemundoContentIndexLogDataLogLogcontentLogRow($model->contentLog);
}
$this->poiOld = $this->getModelValue($model->poiOld);
$this->poiNew = $this->getModelValue($model->poiNew);
}
private function loadNemundoContentIndexLogDataLogLogcontentLogRow($model) {
$this->contentLog = new \Nemundo\Content\Index\Log\Data\Log\LogRow($this->row, $model);
}
}