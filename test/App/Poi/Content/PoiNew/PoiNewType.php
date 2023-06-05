<?php
namespace Nemundo\ContentTest\App\Poi\Content\PoiNew;
use Nemundo\Content\Type\AbstractContentType;
class PoiNewType extends AbstractContentType {
protected function loadContentType() {
$this->typeLabel = 'PoiNew';
$this->typeId = '53847134-15c8-47c4-9287-7ff89e74e276';
$this->formClassList[] = PoiNewForm::class;
$this->viewClassList[] = PoiNewView::class;
$this->itemClass = PoiNewItem::class;
}
}