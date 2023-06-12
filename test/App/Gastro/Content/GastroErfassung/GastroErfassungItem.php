<?php
namespace Nemundo\ContentTest\App\Gastro\Content\GastroErfassung;
use Nemundo\Content\Type\AbstractContentItem;
class GastroErfassungItem extends AbstractContentItem {
protected function loadItem() {
$this->contentType = new GastroErfassungType();
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