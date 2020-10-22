<?php
namespace Nemundo\Content\Index\Geo\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class GeoCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexModel());
}
}