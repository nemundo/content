<?php
namespace Nemundo\ContentTest\App\Gastro\Data\GastroErfassung;
class GastroErfassungValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var GastroErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GastroErfassungModel();
}
}