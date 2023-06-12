<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiEdit;
class PoiEdit extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var PoiEditModel
*/
protected $model;

public function __construct() {
parent::__construct();
$this->model = new PoiEditModel();
}
public function save() {
$id = parent::save();
return $id;
}
}