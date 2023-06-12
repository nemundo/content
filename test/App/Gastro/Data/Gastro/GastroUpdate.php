<?php
namespace Nemundo\ContentTest\App\Gastro\Data\Gastro;
use Nemundo\Model\Data\AbstractModelUpdate;
class GastroUpdate extends AbstractModelUpdate {
/**
* @var GastroModel
*/
public $model;

/**
* @var string
*/
public $gastro;

public function __construct() {
parent::__construct();
$this->model = new GastroModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->gastro, $this->gastro);
parent::update();
}
}