<?php
namespace Nemundo\ContentTest\App\Poi\Data\Poi;
class PoiDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var PoiModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PoiModel();
}
}