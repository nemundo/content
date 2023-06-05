<?php
namespace Nemundo\ContentTest\App\Gastro\Content\GastroWorkflow;
use Nemundo\Content\Type\AbstractContentType;
class GastroWorkflowType extends AbstractContentType {
protected function loadContentType() {
$this->typeLabel = 'GastroWorkflow';
$this->typeId = 'f020f295-788d-49be-87dd-c4c5c7f4ac6a';
$this->formClassList[] = GastroWorkflowForm::class;
$this->viewClassList[] = GastroWorkflowView::class;
$this->itemClass = GastroWorkflowItem::class;
}
}