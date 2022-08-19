<?php

namespace Nemundo\Content\Service;

use Nemundo\App\WebService\Service\AbstractServiceRequest;
use Nemundo\Content\Builder\ContentBuilder;
use Nemundo\Content\Builder\IndexBuilder;
use Nemundo\Core\Http\Request\HttpRequest;

class ContentDeleteService extends AbstractServiceRequest
{

    protected function loadService()
    {
        $this->serviceName = 'content-delete';
    }


    public function onRequest()
    {

        $contentId = (new HttpRequest('content'))->getValue();
        $content = (new ContentBuilder())->getContent($contentId);


        (new IndexBuilder())->deleteIndex($content);

        $content->deleteType();




        $this->sendOkStatus();

    }

}