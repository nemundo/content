<?php


namespace Nemundo\Content\Index\Tree\Service;


use Nemundo\App\WebService\Service\AbstractListServiceRequest;
use Nemundo\App\WebService\Service\AbstractServiceRequest;
use Nemundo\Content\Builder\ContentBuilder;
use Nemundo\Content\Index\Tree\Action\TreeContentAction;
use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;
use Nemundo\Core\Http\Request\HttpRequest;

// TreeActionService
class TreePostService extends AbstractListServiceRequest
{

    protected function loadService()
    {
        $this->serviceName = 'tree-post';
    }


    public function onRequest()
    {

        $contentId = (new HttpRequest('content'))->getValue();
        $content = (new ContentBuilder())->getContent($contentId);
        $parentId = (new HttpRequest('parent'))->getValue();

        $action = new TreeContentAction();
        $action->parentId = $parentId;
        $action->onAction($content);


    }

}