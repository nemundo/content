<?php
namespace Nemundo\ContentTest\App\Poi\Content\Decline;
use Nemundo\Content\View\AbstractContentView;
class DeclineView extends AbstractContentView {
protected function loadView() {
$this->viewName='default';
$this->viewId = '336b36b5-ac30-4b10-a2ce-790d62e98e19';
$this->defaultView = true;
}
public function getContent() {
return parent::getContent();
}
}