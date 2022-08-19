<?php


namespace Nemundo\Content\Service;


use Nemundo\App\WebService\Service\AbstractServiceRequest;
use Nemundo\Content\Builder\ContentTypeBuilder;
use Nemundo\Content\Type\AbstractType;
use Nemundo\Content\Type\WebServiceTrait;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Request\HttpRequest;

class ContentPostServiceRequest extends AbstractServiceRequest
{

    protected function loadService()
    {
        $this->serviceName = 'content-post';
    }


    public function onRequest()
    {

        $contentTypeId = (new HttpRequest('content_type'))->getValue();

        /** @var AbstractType|WebServiceTrait $contentType */
        $contentType = (new ContentTypeBuilder())->getContentType($contentTypeId);

        if ($contentType->isObjectOfTrait(WebServiceTrait::class)) {

            $contentType->callWebService();

        } else {

            (new Debug())->write('No WebService');

        }


        // TODO: Implement onRequest() method.
    }

}