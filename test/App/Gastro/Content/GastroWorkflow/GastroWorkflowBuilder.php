<?php
namespace Nemundo\ContentTest\App\Gastro\Content\GastroWorkflow;
use Nemundo\Content\Type\AbstractContentBuilder;
class GastroWorkflowBuilder extends AbstractContentBuilder {
protected function loadBuilder() {
$this->contentType = new GastroWorkflowType();
}
protected function onCreate() {
}
protected function onUpdate() {
}
}