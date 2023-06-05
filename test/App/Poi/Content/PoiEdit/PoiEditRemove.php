<?php
namespace Nemundo\ContentTest\App\Poi\Content\PoiEdit;
use Nemundo\Content\Type\AbstractContentRemove;
class PoiEditRemove extends AbstractContentRemove {
protected function loadRemove() {
$this->contentType = new PoiEditType();
}
protected function onDelete() {
}
}