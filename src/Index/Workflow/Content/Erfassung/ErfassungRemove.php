<?php
namespace Nemundo\Content\Index\Workflow\Content\Erfassung;
use Nemundo\Content\Type\AbstractContentRemove;
class ErfassungRemove extends AbstractContentRemove {
protected function loadRemove() {
$this->contentType = new ErfassungType();
}
protected function onDelete() {
}
}