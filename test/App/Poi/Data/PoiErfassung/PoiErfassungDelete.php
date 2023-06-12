<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiErfassung;
class PoiErfassungDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var PoiErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PoiErfassungModel();
}
}