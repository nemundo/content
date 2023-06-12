<?php
namespace Nemundo\ContentTest\App\Gastro\Data\GastroErfassung;
class GastroErfassungRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var GastroErfassungModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $gastro;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->gastro = $this->getModelValue($model->gastro);
}
}