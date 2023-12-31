<?php
namespace Nemundo\ContentTest\App\Poi\Content\Poi;
use Nemundo\Content\Type\AbstractContentRemove;
class PoiRemove extends AbstractContentRemove {
protected function loadRemove() {
$this->contentType = new PoiType();
}
protected function onDelete() {
}
}