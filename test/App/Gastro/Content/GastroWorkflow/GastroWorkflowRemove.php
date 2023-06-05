<?php
namespace Nemundo\ContentTest\App\Gastro\Content\GastroWorkflow;
use Nemundo\Content\Type\AbstractContentRemove;
class GastroWorkflowRemove extends AbstractContentRemove {
protected function loadRemove() {
$this->contentType = new GastroWorkflowType();
}
protected function onDelete() {
}
}