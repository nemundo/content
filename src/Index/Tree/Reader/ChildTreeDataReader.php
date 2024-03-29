<?php

namespace Nemundo\Content\Index\Tree\Reader;

use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;

class ChildTreeDataReader extends TreeReader
{

    public $contentId;



    public function getData()
    {

        $this->model->loadChild();
        $this->model->child->loadContentType();
        $this->model->loadView();
        $this->filter->andEqual($this->model->parentId, $this->contentId);


        $this->addOrder($this->model->itemOrder);

        return parent::getData(); // TODO: Change the autogenerated stub

    }

}