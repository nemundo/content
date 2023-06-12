<?php
namespace Nemundo\ContentTest\App\Gastro\Content\GastroErfassung;
use Nemundo\Content\Type\AbstractContentRemove;
class GastroErfassungRemove extends AbstractContentRemove {
protected function loadRemove() {
$this->contentType = new GastroErfassungType();
}
protected function onDelete() {
}
}