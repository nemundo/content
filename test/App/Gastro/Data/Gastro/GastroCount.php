<?php
namespace Nemundo\ContentTest\App\Gastro\Data\Gastro;
class GastroCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var GastroModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GastroModel();
}
}