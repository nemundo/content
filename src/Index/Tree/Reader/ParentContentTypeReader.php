<?php


namespace Nemundo\Content\Index\Tree\Reader;


use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Row\ContentCustomRow;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Base\DataSource\AbstractDataSource;

class ParentContentTypeReader extends AbstractDataSource
{

    /**
     * @var AbstractContentType
     */
    public $contentType;









    protected function loadData()
    {


        $this->getParent($this->contentType->getContentId());


        /*
        $reader = new TreeReader();
        $reader->model->loadParent();
        $reader->model->parent->loadContentType();
        $reader->filter->andEqual($reader->model->childId, $this->contentType->getContentId());
        foreach ($reader->getData() as $treeRow) {

//            $this->addItem($treeRow->parent->getContentType());

            /*
            //$list[] = $treeRow->parent->getContentType();*/

         /*   $this->getParent($treeRow->parentId);



        }


        /*
        $list=[];
        $list=$this->getParent($this->contentType->getContentId());
        */

        //foreach ($contentType->getParentParentContentTypeList() as $parent) {

       /*     $site = clone($this->redirectSite);
            $site->title = $parent->getSubject();
            $site->addParameter(new ContentParameter($parent->getContentId()));
            $this->addSite($site);

            /*$site = clone($this->redirectSite);
            $site->title = $contentType->getSubject();
            $site->addParameter(new ContentParameter($contentType->getContentId()));
            $this->addSite($site);*/

        //}


        // TODO: Implement loadData() method.
    }



    private function getParent($contentId) {


        $reader = new TreeReader();
        $reader->model->loadParent();
        $reader->model->parent->loadContentType();
        $reader->filter->andEqual($reader->model->childId, $contentId);
        foreach ($reader->getData() as $treeRow) {
//            $list[] = $treeRow->parent->getContentType();

             $this->getParent($treeRow->parentId);  //,$list);

            $this->addItem($treeRow->parent->getContentType());




        }


        //return $list;

    }



}