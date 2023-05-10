<?php
namespace Nemundo\ContentTest\Content\Poi;
use Nemundo\Content\Type\AbstractContentRemove;
class PoiRemove extends AbstractContentRemove {
protected function loadRemove() {
$this->contentType = new PoiType();
}
protected function onDelete() {
}
}