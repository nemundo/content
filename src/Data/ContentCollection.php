<?php
namespace Nemundo\Content\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class ContentCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\Data\ApplicationContentType\ApplicationContentTypeModel());
$this->addModel(new \Nemundo\Content\Data\Content\ContentModel());
$this->addModel(new \Nemundo\Content\Data\ContentIndex\ContentIndexModel());
$this->addModel(new \Nemundo\Content\Data\ContentType\ContentTypeModel());
$this->addModel(new \Nemundo\Content\Data\Tree\TreeModel());
}
}