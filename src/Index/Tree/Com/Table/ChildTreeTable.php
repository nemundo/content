<?php


namespace Nemundo\Content\Index\Tree\Com\Table;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\Com\Container\AbstractContentTypeContainer;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Debug\Debug;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Content\Com\Container\AbstractParentContainer;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Web\Site\AbstractSite;


class ChildTreeTable extends AbstractContentTypeContainer
{

    public function getContent()
    {

        //if ($this->contentType->hashasChParent()) {

            $table = new AdminClickableTable($this);

            $header = new TableHeader($table);
            $header->addText('Child');
            $header->addText('Typ');

            foreach ($this->contentType->getChild() as $contentRow) {

                $row = new BootstrapClickableTableRow($table);
                $contentType = $contentRow->child->getContentType();

                /*if ($contentType->hasViewSite()) {
                $row->addSite($contentType->getSubjectViewSite());
                }*/
                $row->addText($contentType->getSubject());
                $row->addText($contentRow->child->contentType->contentType);

                $site = clone($this->redirectSite);
                $site->addParameter(new ContentParameter($contentRow->childId));
                $row->addClickableSite($site);

                //$row->addClickableSite($contentType->getViewSite());

            }

        //}

        return parent::getContent();

    }

}