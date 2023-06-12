<?php
namespace Nemundo\ContentTest\App\Gastro\Data\Gastro;
class Gastro extends \Nemundo\Model\Data\AbstractModelData {
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