<?php


namespace Nemundo\Content\Index\Tree\Service;


use Nemundo\App\WebService\Service\AbstractListServiceRequest;
use Nemundo\App\WebService\Service\AbstractServiceRequest;
use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;
use Nemundo\Content\Index\Tree\Reader\ParentContentReader;
use Nemundo\Core\Http\Request\HttpRequest;


class BreadcrumbService extends AbstractListServiceRequest
{

    protected function loadService()
    {
        $this->serviceName = 'tree-breadcrumb';
    }


    public function onRequest()
    {

        $contentId = (new HttpRequest('content'))->getValue();

        $reader = new ParentContentReader();
        $reader->reverse=true;
        $reader->treeId = $contentId;
        /*$reader->model->loadChild();
        $reader->model->child->loadContentType();
        $reader->model->loadView();
        $reader->filter->andEqual($reader->model->parentId, $contentId);
        $reader->addOrder($reader->model->itemOrder);*/
        foreach ($reader->getData() as $treeRow) {

            $data = [];
            $data['content_id'] = $treeRow->id;
            $data['content_type'] = $treeRow->contentType->contentType;
            $data['content_type_id'] = $treeRow->contentTypeId;
            $data['subject'] = $treeRow->subject;

            $this->addRow($data);

        }

    }

}