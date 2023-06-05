<?php
namespace Nemundo\ContentTest\App\Poi\Data\Erfassung;
use Nemundo\Model\Id\AbstractModelIdValue;
class ErfassungId extends AbstractModelIdValue {
/**
* @var ErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ErfassungModel();
}
}