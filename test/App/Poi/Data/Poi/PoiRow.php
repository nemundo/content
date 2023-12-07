<?php
namespace Nemundo\ContentTest\App\Poi\Data\Poi;
class PoiRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var PoiModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $poi;

/**
* @var \Nemundo\Core\Type\Geo\GeoCoordinate
*/
public $geoCoordinate;

/**
* @var string
*/
public $description;

/**
* @var int
*/
public $statusId;

/**
* @var \Nemundo\Content\Index\Log\Data\Status\StatusRow
*/
public $status;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->poi = $this->getModelValue($model->poi);
$property = new \Nemundo\Model\Reader\Property\Geo\GeoCoordinateReaderProperty($row, $model->geoCoordinate);
$this->geoCoordinate = $property->getValue();
$this->description = $this->getModelValue($model->description);
$this->statusId = intval($this->getModelValue($model->statusId));
if ($model->status !== null) {
$this->loadNemundoContentIndexLogDataStatusStatusstatusRow($model->status);
}
}
private function loadNemundoContentIndexLogDataStatusStatusstatusRow($model) {
$this->status = new \Nemundo\Content\Index\Log\Data\Status\StatusRow($this->row, $model);
}
}