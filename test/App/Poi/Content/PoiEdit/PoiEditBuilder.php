<?php
namespace Nemundo\ContentTest\App\Poi\Content\PoiEdit;
use Nemundo\Content\Type\AbstractContentBuilder;
class PoiEditBuilder extends AbstractContentBuilder {
protected function loadBuilder() {
$this->contentType = new PoiEditType();
}
protected function onCreate() {
}
protected function onUpdate() {
}
}