<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiLog;
use Nemundo\Model\Data\AbstractModelUpdate;
class PoiLogUpdate extends AbstractModelUpdate {
/**
* @var PoiLogModel
*/
public $model;

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
public function update() {
$this->typeValueList->setModelValue($this->model->contentLogId, $this->contentLogId);
$this->typeValueList->setModelValue($this->model->poiOld, $this->poiOld);
$this->typeValueList->setModelValue($this->model->poiNew, $this->poiNew);
parent::update();
}
}