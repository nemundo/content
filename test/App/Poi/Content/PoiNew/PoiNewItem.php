<?php
namespace Nemundo\ContentTest\App\Poi\Content\PoiNew;
use Nemundo\Content\Type\AbstractContentItem;
class PoiNewItem extends AbstractContentItem {
protected function loadItem() {
$this->contentType = new PoiNewType();
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