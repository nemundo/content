<?php
namespace Nemundo\ContentTest\App\Poi\Data\Erfassung;
class ErfassungCount extends \Nemundo\Model\Count\AbstractModelDataCount {
/**
* @var ErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ErfassungModel();
}
}