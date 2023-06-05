<?php
namespace Nemundo\Content\Index\Workflow\Content\Erfassung;
use Nemundo\Content\Type\AbstractContentBuilder;
class ErfassungBuilder extends AbstractContentBuilder {
protected function loadBuilder() {
$this->contentType = new ErfassungType();
}
protected function onCreate() {
}
protected function onUpdate() {
}
}