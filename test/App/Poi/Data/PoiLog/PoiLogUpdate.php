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
public $poiOld;

/**
* @var string
*/
public $poiNew;

/**
* @var bool
*/
public $poiHasChanged;

/**
* @var bool
*/
public $descriptionHasChanged;

/**
* @var string
*/
public $descriptionOld;

/**
* @var string
*/
public $descriptionNew;

public function __construct() {
parent::__construct();
$this->model = new PoiLogModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->poiOld, $this->poiOld);
$this->typeValueList->setModelValue($this->model->poiNew, $this->poiNew);
$this->typeValueList->setModelValue($this->model->poiHasChanged, $this->poiHasChanged);
$this->typeValueList->setModelValue($this->model->descriptionHasChanged, $this->descriptionHasChanged);
$this->typeValueList->setModelValue($this->model->descriptionOld, $this->descriptionOld);
$this->typeValueList->setModelValue($this->model->descriptionNew, $this->descriptionNew);
parent::update();
}
}