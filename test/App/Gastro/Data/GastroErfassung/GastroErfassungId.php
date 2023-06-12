<?php
namespace Nemundo\ContentTest\App\Gastro\Data\GastroErfassung;
use Nemundo\Model\Id\AbstractModelIdValue;
class GastroErfassungId extends AbstractModelIdValue {
/**
* @var GastroErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GastroErfassungModel();
}
}