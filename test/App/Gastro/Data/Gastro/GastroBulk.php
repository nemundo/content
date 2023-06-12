<?php
namespace Nemundo\ContentTest\App\Gastro\Data\Gastro;
class GastroBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var GastroModel
*/
protected $model;

/**
* @var string
*/
public $gastro;

public function __construct() {
parent::__construct();
$this->model = new GastroModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->gastro, $this->gastro);
$id = parent::save();
return $id;
}
}