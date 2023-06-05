<?php
namespace Nemundo\ContentTest\App\Poi\Content\Decline;
use Nemundo\Content\Type\AbstractContentItem;
class DeclineItem extends AbstractContentItem {
protected function loadItem() {
$this->contentType = new DeclineType();
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