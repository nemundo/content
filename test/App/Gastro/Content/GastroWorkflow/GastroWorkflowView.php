<?php
namespace Nemundo\ContentTest\App\Gastro\Content\GastroWorkflow;
use Nemundo\Content\View\AbstractContentView;
class GastroWorkflowView extends AbstractContentView {
protected function loadView() {
$this->viewName='default';
$this->viewId = 'b0c38d69-b1fa-44b1-8f43-0fb446e390c3';
$this->defaultView = true;
}
public function getContent() {
return parent::getContent();
}
}