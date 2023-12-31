<?php
namespace Nemundo\ContentTest\App\Poi\Content\Poi;
use Nemundo\Content\Type\AbstractContentType;
class PoiType extends AbstractContentType {
protected function loadContentType() {
$this->typeLabel = 'Poi';
$this->typeId = 'b9e7671c-2f7e-4ddc-adb1-8f70a9029502';
$this->formClassList[] = PoiForm::class;
$this->viewClassList[] = PoiView::class;
$this->itemClass = PoiItem::class;
}
}