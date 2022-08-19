<?php

namespace Nemundo\Content\Index\Geo\Service;


use Nemundo\App\WebService\Service\AbstractListServiceRequest;
use Nemundo\Content\Index\Geo\Data\GeoContentType\GeoContentTypeReader;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexPaginationReader;
use Nemundo\Core\Http\Request\HttpRequest;

class GeoContentTypeListService extends AbstractListServiceRequest
{

    protected function loadService()
    {
        $this->serviceName = 'geo-content-type-list';
    }


    public function onRequest()
    {

        $reader = new GeoContentTypeReader();
        $reader->model->loadContentType();
        $reader->addOrder($reader->model->contentType->contentType);
        foreach ($reader->getData() as $row) {

            $data = [];
            $data['content_type_id'] = $row->contentTypeId;
            $data['content_type'] = $row->contentType->contentType;

            $this->addRow($data);

        }

    }

}