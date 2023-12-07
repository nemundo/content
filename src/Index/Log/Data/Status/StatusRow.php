<?php
namespace Nemundo\Content\Index\Log\Data\Status;
class StatusRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var StatusModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $status;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->status = $this->getModelValue($model->status);
}
}