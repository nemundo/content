<?php
namespace Nemundo\Content\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class ContentCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\Data\Content\ContentModel());
$this->addModel(new \Nemundo\Content\Data\ContentType\ContentTypeModel());
}
}