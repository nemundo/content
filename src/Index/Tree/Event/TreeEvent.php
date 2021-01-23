<?php


namespace Nemundo\Content\Index\Tree\Event;


use Nemundo\Content\Event\AbstractContentEvent;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Index\Tree\Writer\TreeWriter;
use Nemundo\Content\Type\AbstractType;

class TreeEvent extends AbstractContentEvent
{

    public $parentId;

    /**
     * @param AbstractType|AbstractTreeContentType $contentType
     */
    public function onCreate(AbstractType $contentType)
    {

        $writer = new TreeWriter();
        $writer->parentId = $this->parentId;
        $writer->childId = $contentType->getContentId();
        //$writer->viewId= $this->getDefaultTreeView() getDefaultTreeViewId();
        $writer->write();

    }

}