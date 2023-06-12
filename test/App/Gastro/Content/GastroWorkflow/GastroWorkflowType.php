<?php
namespace Nemundo\ContentTest\App\Gastro\Content\GastroWorkflow;
use Nemundo\Content\Index\Workflow\Type\Process\AbstractProcess;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\ContentTest\App\Gastro\Content\GastroErfassung\GastroErfassungType;

class GastroWorkflowType extends AbstractProcess {
protected function loadContentType() {
$this->typeLabel = 'GastroWorkflow';
$this->typeId = 'f020f295-788d-49be-87dd-c4c5c7f4ac6a';
//$this->formClassList[] = GastroWorkflowForm::class;
$this->viewClassList[] = GastroWorkflowView::class;
$this->itemClass = GastroWorkflowItem::class;
$this->startStatusClass=GastroErfassungType::class;

}
}