<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiEdit;
use Nemundo\Model\Id\AbstractModelIdValue;
class PoiEditId extends AbstractModelIdValue {
/**
* @var PoiEditModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PoiEditModel();
}
}