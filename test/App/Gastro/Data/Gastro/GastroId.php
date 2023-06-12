<?php
namespace Nemundo\ContentTest\App\Gastro\Data\Gastro;
use Nemundo\Model\Id\AbstractModelIdValue;
class GastroId extends AbstractModelIdValue {
/**
* @var GastroModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GastroModel();
}
}