<?php


namespace Nemundo\Content\Index\Tree\Com\Container;


use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\Com\Container\AbstractContentTypeContainer;
use Nemundo\Content\Index\Tree\Com\Table\ChildTreeTable;
use Nemundo\Content\Index\Tree\Com\Table\ParentTreeTable;
use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;
use Nemundo\Content\Index\Tree\Type\TreeIndexTrait;
use Nemundo\Content\Row\ContentCustomRow;

class TreeIndexContainer extends AbstractContentTypeContainer
{

    public function getContent()
    {

        //if ($this->contentType->isObjectOfTrait(TreeIndexTrait::class)) {

            $widget = new AdminWidget($this);
            $widget->widgetTitle = 'Tree (new)';


            $table= new AdminTable($widget);


            /*
        $reader = new TreeReader();
        $reader->model->loadParent();
        $reader->model->parent->loadContentType();
        $reader->filter->andEqual($reader->model->childId, $this->contentType->getContentId());

        /** @var ContentCustomRow[] $doc */

       /* foreach ($reader->getData() as $treeRow) {

            //$doc[] = $treeRow->parent;

            $row=new TableRow($table);
            $row->addText($treeRow->parent->subject);
            $row->addText($treeRow->parent->contentType->contentType);


        }*/






        /*
            $table = new ParentTreeTable($widget);
            $table->contentType = $this->contentType;
            $table->redirectSite = $this->redirectSite;
*/




            /*
            if ($this->contentType->hasChild()) {
                $table = new ChildTreeTable($widget);
                $table->contentType = $this->contentType;
                $table->redirectSite = $this->redirectSite;
            }*/

        //}

        return parent::getContent();

    }

}