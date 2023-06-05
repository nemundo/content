<?php
namespace Nemundo\ContentTest\App\Poi\Content\PoiNew;
use Nemundo\Content\View\AbstractContentView;
class PoiNewView extends AbstractContentView {
protected function loadView() {
$this->viewName='default';
$this->viewId = 'd0c2f0c9-be40-4214-bbc5-b201994976a7';
$this->defaultView = true;
}
public function getContent() {
return parent::getContent();
}
}