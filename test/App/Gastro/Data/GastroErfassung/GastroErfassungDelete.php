<?php
namespace Nemundo\ContentTest\App\Gastro\Data\GastroErfassung;
class GastroErfassungDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var GastroErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new GastroErfassungModel();
}
}