<?php
namespace Nemundo\ContentTest\App\Poi\Content\PoiWorkflow;
use Nemundo\Content\Type\AbstractContentRemove;
class PoiWorkflowRemove extends AbstractContentRemove {
protected function loadRemove() {
$this->contentType = new PoiWorkflowType();
}
protected function onDelete() {
}
}