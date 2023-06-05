<?php
namespace Nemundo\ContentTest\App\Poi\Data\Erfassung;
use Nemundo\Model\Data\AbstractModelUpdate;
class ErfassungUpdate extends AbstractModelUpdate {
/**
* @var ErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ErfassungModel();
}
public function update() {
parent::update();
}
}