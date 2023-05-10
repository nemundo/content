<?php
namespace Nemundo\ContentTest\App\Poi\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class PoiModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\ContentTest\App\Poi\Data\Poi\PoiModel());
}
}