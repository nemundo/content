<?php
namespace Nemundo\ContentTest\App\Gastro\Data\GastroErfassung;
class GastroErfassungCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var GastroErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GastroErfassungModel();
}
}