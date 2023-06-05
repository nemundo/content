<?php
namespace Nemundo\ContentTest\App\Poi\Data\Erfassung;
class ErfassungValue extends \Nemundo\Model\Value\AbstractModelDataValue {
/**
* @var ErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ErfassungModel();
}
}