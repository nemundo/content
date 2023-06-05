<?php
namespace Nemundo\ContentTest\App\Poi\Data\Erfassung;
class Erfassung extends \Nemundo\Model\Data\AbstractModelData {
/**
* @var ErfassungModel
*/
protected $model;

public function __construct() {
parent::__construct();
$this->model = new ErfassungModel();
}
public function save() {
$id = parent::save();
return $id;
}
}