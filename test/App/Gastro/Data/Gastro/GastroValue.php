<?php
namespace Nemundo\ContentTest\App\Gastro\Data\Gastro;
class GastroValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var GastroModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GastroModel();
}
}