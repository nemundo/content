<?php

namespace Nemundo\Content\Index\Tree\Service;

use Nemundo\App\WebService\Service\AbstractListServiceRequest;
use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;
use Nemundo\Core\Http\Request\HttpRequest;

class ChildTreeSearchService extends AbstractListServiceRequest
{

    protected function loadService()
    {
        $this->serviceName = 'tree-child-search';
    }


    public function onRequest()
    {


        $reader = new TreeReader();
        $reader->model->loadChild();
        $reader->model->child->loadContentType();
        $reader->model->loadView();


        $request = new HttpRequest('parent');
        //if ($request->hasValue()) {
            $reader->filter->andEqual($reader->model->parentId, $request->getValue());
            //$parentId = (new HttpRequest('parent'))->getValue();
        //}


        /*$request = new HttpRequest('child');
        if ($request->hasValue()) {
            $reader->filter->andEqual($reader->model->childId, $request->getValue());
            //$parentId = (new HttpRequest('parent'))->getValue();
        }*/



        $reader->addOrder($reader->model->itemOrder);
        foreach ($reader->getData() as $treeRow) {

            $data = [];
            $data['tree_id'] = $treeRow->id;
            $data['content_id'] = $treeRow->child->id;
            $data['data_id'] = $treeRow->child->dataId;
            $data['content_type_id'] = $treeRow->child->contentTypeId;
            $data['content_type'] = $treeRow->child->contentType->contentType;
            $data['subject'] = $treeRow->child->subject;

            $this->addRow($data);

        }

    }

}