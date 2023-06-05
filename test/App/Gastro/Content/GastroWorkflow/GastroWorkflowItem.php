<?php
namespace Nemundo\ContentTest\App\Gastro\Content\GastroWorkflow;
use Nemundo\Content\Type\AbstractContentItem;
class GastroWorkflowItem extends AbstractContentItem {
protected function loadItem() {
$this->contentType = new GastroWorkflowType();
}
protected function onDataRow() {
}
/**
* @return \Nemundo\Model\Row\AbstractModelDataRow
*/
public function getDataRow() {
return parent::getDataRow(); 
}
}