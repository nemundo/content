<?php
namespace Nemundo\ContentTest\App\Gastro\Data\GastroErfassung;
class GastroErfassung extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var GastroErfassungModel
*/
protected $model;

/**
* @var string
*/
public $gastro;

public function __construct() {
parent::__construct();
$this->model = new GastroErfassungModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->gastro, $this->gastro);
$id = parent::save();
return $id;
}
}