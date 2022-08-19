<?php

namespace Nemundo\Content\Service;


use Nemundo\App\WebService\Service\AbstractListServiceRequest;
use Nemundo\App\WebService\Service\AbstractServiceRequest;
use Nemundo\Content\Builder\ContentTypeBuilder;
use Nemundo\Core\Http\Request\HttpRequest;


class DataContentJsonService extends AbstractListServiceRequest  // AbstractServiceRequest
{

    protected function loadService()
    {
        $this->serviceName = 'data-content-json';
    }


    public function onRequest()
    {

        $dataId = (new HttpRequest('data-id'))->getValue();
        $contentTypeId = (new HttpRequest('content-type'))->getValue();
        $contentType = (new ContentTypeBuilder())->getContentType($contentTypeId);
        $contentType->fromDataId($dataId);
        $data = $contentType->getJsonData();

        $this->addRow($data);

        //$this->setData($data);

    }

}