<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiEdit;
class PoiEditDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var PoiEditModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PoiEditModel();
}
}