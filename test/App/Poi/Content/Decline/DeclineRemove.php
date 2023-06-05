<?php
namespace Nemundo\ContentTest\App\Poi\Content\Decline;
use Nemundo\Content\Type\AbstractContentRemove;
class DeclineRemove extends AbstractContentRemove {
protected function loadRemove() {
$this->contentType = new DeclineType();
}
protected function onDelete() {
}
}