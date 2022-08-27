<?php

namespace Nemundo\Content\Index\Tree\Reader;

use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;

class ParentTreeDataReader extends TreeReader
{

    public $contentId;

    public function getData()
    {

        $this->model->loadParent();
        $this->model->parent->loadContentType();
        $this->model->loadView();
        $this->filter->andEqual($this->model->childId, $this->contentId);

        $this->addOrder($this->model->itemOrder);

        return parent::getData();

    }

}