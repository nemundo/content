<?php
namespace Nemundo\ContentTest\App\Poi\Content\Decline;
use Nemundo\Content\Type\AbstractContentBuilder;
class DeclineBuilder extends AbstractContentBuilder {
protected function loadBuilder() {
$this->contentType = new DeclineType();
}
protected function onCreate() {
}
protected function onUpdate() {
}
}