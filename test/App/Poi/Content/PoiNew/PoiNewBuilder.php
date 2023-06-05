<?php
namespace Nemundo\ContentTest\App\Poi\Content\PoiNew;
use Nemundo\Content\Type\AbstractContentBuilder;
class PoiNewBuilder extends AbstractContentBuilder {
protected function loadBuilder() {
$this->contentType = new PoiNewType();
}
protected function onCreate() {
}
protected function onUpdate() {
}
}