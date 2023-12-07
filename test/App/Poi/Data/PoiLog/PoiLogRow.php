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

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->poiOld = $this->getModelValue($model->poiOld);
$this->poiNew = $this->getModelValue($model->poiNew);
$this->poiHasChanged = boolval($this->getModelValue($model->poiHasChanged));
$this->descriptionHasChanged = boolval($this->getModelValue($model->descriptionHasChanged));
$this->descriptionOld = $this->getModelValue($model->descriptionOld);
$this->descriptionNew = $this->getModelValue($model->descriptionNew);
}
}