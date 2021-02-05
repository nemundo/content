<?php


namespace Nemundo\Content\Index\Tree\Page;


use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\Admin\Template\ContentTemplate;
use Nemundo\Content\App\Explorer\Content\Base\BaseContainerContentType;
use Nemundo\Content\App\Explorer\Data\ExplorerContentType\ExplorerContentType;
use Nemundo\Content\Index\Tree\Com\Breadcrumb\TreeBreadcrumb;
use Nemundo\Content\Index\Tree\Data\Tree\TreePaginationReader;
use Nemundo\Content\Index\Tree\Parameter\ParentParameter;
use Nemundo\Content\Index\Tree\Site\TreeSite;

use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class TreePage extends ContentTemplate
{

    public function getContent()
    {


        $layout=new BootstrapTwoColumnLayout($this);








        /*
        $parentId = 1;
        $parameter= new ParentParameter();
        if ($parameter->hasValue()) {
            $parentId=$parameter->getValue();
            $parameter->getContentType(false)->getDefaultView($layout->col2);

            $breadcrumb = new TreeBreadcrumb($layout->col1);
            $breadcrumb->contentType = $parameter->getContentType(false);

        }








        $table = new AdminClickableTable($layout->col1);

        $header = new TableHeader($table);
        $header->addText('Parent');
        $header->addText('Parent Subject');
        $header->addText('Parent Id');
        $header->addText('Child');
        $header->addText('Child Subject');
        $header->addText('Child Id');
        $header->addText('Item Order');
        $header->addText('View Id');

        $treeReader = new TreePaginationReader();
        $treeReader->model->loadParent();
        $treeReader->model->parent->loadContentType();
        $treeReader->model->loadChild();
        $treeReader->model->child->loadContentType();
        $treeReader->filter->andEqual($treeReader->model->parentId,$parentId);
        $treeReader->addOrder($treeReader->model->id, SortOrder::DESCENDING);
        $treeReader->paginationLimit = 50;


        foreach ($treeReader->getData() as $treeRow) {

            $row = new BootstrapClickableTableRow($table);

            $row->addText($treeRow->parent->contentType->contentType);

            $contentType = $treeRow->parent->getContentType();
            $row->addText($contentType->getSubject());

            $row->addText($treeRow->parentId);


            $row->addText($treeRow->child->contentType->contentType);
            $contentType = $treeRow->child->getContentType();
            $row->addText($contentType->getSubject());
            $row->addText($treeRow->childId);
            $row->addText($treeRow->itemOrder);
            $row->addText($treeRow->viewId);

            $site=clone(TreeSite::$site);
            $site->addParameter(new ParentParameter($treeRow->childId));
            $row->addClickableSite($site);

        }

        $pagination = new BootstrapPagination($this);
        $pagination->paginationReader = $treeReader;*/



        return parent::getContent();


    }

}