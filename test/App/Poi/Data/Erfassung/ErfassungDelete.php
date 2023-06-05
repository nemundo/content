<?php
namespace Nemundo\ContentTest\App\Poi\Data\Erfassung;
class ErfassungDelete extends \Nemundo\Model\Delete\AbstractModelDelete {
/**
* @var ErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ErfassungModel();
}
}