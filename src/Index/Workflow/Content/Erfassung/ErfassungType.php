<?php
namespace Nemundo\Content\Index\Workflow\Content\Erfassung;
use Nemundo\Content\Type\AbstractContentType;
class ErfassungType extends AbstractContentType {
protected function loadContentType() {
$this->typeLabel = 'Erfassung';
$this->typeId = '5d31af8f-4c0a-4be6-93f1-0a8e2f01fb03';
$this->formClassList[] = ErfassungForm::class;
$this->viewClassList[] = ErfassungView::class;
$this->itemClass = ErfassungItem::class;
}
}