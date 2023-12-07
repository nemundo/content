<?php
namespace Nemundo\ContentTest\App\Poi\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class PoiModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\ContentTest\App\Poi\Data\Approval\ApprovalModel());
$this->addModel(new \Nemundo\ContentTest\App\Poi\Data\Poi\PoiModel());
$this->addModel(new \Nemundo\ContentTest\App\Poi\Data\PoiEdit\PoiEditModel());
$this->addModel(new \Nemundo\ContentTest\App\Poi\Data\PoiErfassung\PoiErfassungModel());
$this->addModel(new \Nemundo\ContentTest\App\Poi\Data\PoiLog\PoiLogModel());
}
}