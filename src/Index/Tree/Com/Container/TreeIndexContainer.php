<?php


namespace Nemundo\Content\Index\Tree\Com\Container;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Content\Com\Container\AbstractContentTypeContainer;
use Nemundo\Content\Index\Tree\Com\Table\ChildTreeTable;
use Nemundo\Content\Index\Tree\Com\Table\ParentTreeTable;
use Nemundo\Content\Index\Tree\Type\TreeIndexTrait;

class TreeIndexContainer extends AbstractContentTypeContainer
{

    public function getContent()
    {

        if ($this->contentType->isObjectOfTrait(TreeIndexTrait::class)) {

            $widget = new AdminWidget($this);
            $widget->widgetTitle = 'Tree';

            $table = new ParentTreeTable($widget);
            $table->contentType = $this->contentType;
            $table->redirectSite = $this->redirectSite;

            if ($this->contentType->hasChild()) {
                $table = new ChildTreeTable($widget);
                $table->contentType = $this->contentType;
                $table->redirectSite = $this->redirectSite;
            }

        }

        return parent::getContent();

    }

}