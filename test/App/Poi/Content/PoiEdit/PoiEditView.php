<?php
namespace Nemundo\ContentTest\App\Poi\Content\PoiEdit;
use Nemundo\Content\View\AbstractContentView;
class PoiEditView extends AbstractContentView {
protected function loadView() {
$this->viewName='default';
$this->viewId = '70c9dcc8-a040-4958-b711-5ee52e9a0886';
$this->defaultView = true;
}
public function getContent() {
return parent::getContent();
}
}