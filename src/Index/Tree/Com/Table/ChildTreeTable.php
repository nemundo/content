<?php


namespace Nemundo\Content\Index\Tree\Com\Table;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Content\Com\Container\AbstractContentTypeContainer;
use Nemundo\Content\Index\Tree\Reader\ChildContentTypeReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;


class ChildTreeTable extends AbstractContentTypeContainer
{

    public function getContent()
    {

        $table = new AdminClickableTable($this);

        $header = new AdminTableHeader($table);
        $header->addText('Child');
        $header->addText('Typ');

        $reader = new ChildContentTypeReader();
        $reader->contentType = $this->contentType;

        foreach ($reader->getData() as $contentType) {

            $row = new BootstrapClickableTableRow($table);
            $row->addText($contentType->getSubject());
            $row->addText($contentType->typeLabel);

            $site = clone($this->redirectSite);
            $site->addParameter(new ContentParameter($contentType->getContentId()));
            $row->addClickableSite($site);

        }

        return parent::getContent();

    }

}