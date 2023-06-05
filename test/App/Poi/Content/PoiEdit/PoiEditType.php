<?php
namespace Nemundo\ContentTest\App\Poi\Content\PoiEdit;
use Nemundo\Content\Type\AbstractContentType;
class PoiEditType extends AbstractContentType {
protected function loadContentType() {
$this->typeLabel = 'PoiEdit';
$this->typeId = '207297c6-fb5a-4f4f-9871-71943bbcbbe1';
$this->formClassList[] = PoiEditForm::class;
$this->viewClassList[] = PoiEditView::class;
$this->itemClass = PoiEditItem::class;
}
}