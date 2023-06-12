<?php
namespace Nemundo\ContentTest\App\Gastro\Data\GastroErfassung;
use Nemundo\Model\Data\AbstractModelUpdate;
class GastroErfassungUpdate extends AbstractModelUpdate {
/**
* @var GastroErfassungModel
*/
public $model;

/**
* @var string
*/
public $gastro;

public function __construct() {
parent::__construct();
$this->model = new GastroErfassungModel();
}
public function update() {
$this->typeValueList->setModelValue($this->model->gastro, $this->gastro);
parent::update();
}
}