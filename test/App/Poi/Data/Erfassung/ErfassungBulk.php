<?php
namespace Nemundo\ContentTest\App\Poi\Data\Erfassung;
class ErfassungBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
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