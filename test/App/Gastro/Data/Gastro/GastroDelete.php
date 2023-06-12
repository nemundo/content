<?php
namespace Nemundo\ContentTest\App\Gastro\Data\Gastro;
class GastroDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var GastroModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GastroModel();
}
}