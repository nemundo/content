<?php


namespace Nemundo\Content\Index\Tree\Com\Container;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Content\App\Explorer\Site\ItemSite;
use Nemundo\Content\Com\Container\AbstractContentTypeContainer;

use Nemundo\Content\Index\Tree\Com\Table\ChildTreeTable;
use Nemundo\Content\Index\Tree\Com\Table\ParentTreeTable;
use Nemundo\Content\Index\Tree\Type\TreeIndexTrait;

class TreeIndexContainer extends AbstractContentTypeContainer
{


    public function getContent()
    {


        if ($this->contentType->isObjectOfTrait(TreeIndexTrait::class)) {

            /*$ul = new UnorderedList($layout->col2);
            foreach ($contentType->getParentContent() as $contentCustomRow) {
                $ul->addText($contentCustomRow->subject);
            }*/


            $widget = new AdminWidget($this);
            $widget->widgetTitle='Tree';

            $table = new ParentTreeTable($widget);
            $table->contentType = $this->contentType;
            $table->redirectSite =$this->redirectSite;

            $table =new ChildTreeTable($widget);
            $table->contentType = $this->contentType;
            $table->redirectSite =$this->redirectSite;

        }

        return parent::getContent();

    }

}