<?php
namespace Nemundo\ContentTest\App\Poi\Content\PoiEdit;
use Nemundo\Content\Type\AbstractContentItem;
class PoiEditItem extends AbstractContentItem {
protected function loadItem() {
$this->contentType = new PoiEditType();
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