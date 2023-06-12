<?php
namespace Nemundo\ContentTest\App\Gastro\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class GastroModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\ContentTest\App\Gastro\Data\Gastro\GastroModel());
$this->addModel(new \Nemundo\ContentTest\App\Gastro\Data\GastroErfassung\GastroErfassungModel());
}
}