<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiLog;
class PoiLogBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var PoiLogModel
*/
protected $model;

/**
* @var string
*/
public $contentLogId;

/**
* @var string
*/
public $poiOld;

/**
* @var string
*/
public $poiNew;

public function __construct() {
parent::__construct();
$this->model = new PoiLogModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->contentLogId, $this->contentLogId);
$this->typeValueList->setModelValue($this->model->poiOld, $this->poiOld);
$this->typeValueList->setModelValue($this->model->poiNew, $this->poiNew);
$id = parent::save();
return $id;
}
}