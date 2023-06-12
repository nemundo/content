<?php
namespace Nemundo\ContentTest\App\Gastro\Content\GastroErfassung;
use Nemundo\Content\View\AbstractContentView;
class GastroErfassungView extends AbstractContentView {
protected function loadView() {
$this->viewName='default';
$this->viewId = 'd5cde761-ab02-4d5a-bbdc-91fc5cf1f3ae';
$this->defaultView = true;
}
public function getContent() {
return parent::getContent();
}
}