<?php
namespace Nemundo\Content\Index\Tree\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class TreeModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\Index\Tree\Data\Tree\TreeModel());
$this->addModel(new \Nemundo\Content\Index\Tree\Data\TreeIndex\TreeIndexModel());
}
}