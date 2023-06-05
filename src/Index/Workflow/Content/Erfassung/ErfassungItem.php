<?php
namespace Nemundo\Content\Index\Workflow\Content\Erfassung;
use Nemundo\Content\Type\AbstractContentItem;
class ErfassungItem extends AbstractContentItem {
protected function loadItem() {
$this->contentType = new ErfassungType();
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