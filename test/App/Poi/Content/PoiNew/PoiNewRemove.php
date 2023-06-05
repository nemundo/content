<?php
namespace Nemundo\ContentTest\App\Poi\Content\PoiNew;
use Nemundo\Content\Type\AbstractContentRemove;
class PoiNewRemove extends AbstractContentRemove {
protected function loadRemove() {
$this->contentType = new PoiNewType();
}
protected function onDelete() {
}
}