<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiErfassung;
class PoiErfassungCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var PoiErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PoiErfassungModel();
}
}