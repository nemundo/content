<?php
namespace Nemundo\ContentTest\App\Poi\Data\PoiErfassung;
use Nemundo\Model\Id\AbstractModelIdValue;
class PoiErfassungId extends AbstractModelIdValue {
/**
* @var PoiErfassungModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new PoiErfassungModel();
}
}