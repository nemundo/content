<?php

namespace Nemundo\Content\Index\Geo\Service;


use Nemundo\App\WebService\Service\AbstractListServiceRequest;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexPaginationReader;
use Nemundo\Core\Http\Request\HttpRequest;

class GeoIndexListService extends AbstractListServiceRequest
{

    protected function loadService()
    {
        // geoindex-search
        $this->serviceName = 'geo-list';
    }


    public function onRequest()
    {

        $reader = new GeoIndexPaginationReader();
        $reader->currentPage = $this->getCurrentPage();
        $reader->paginationLimit = $this->getPaginationLimit();
        $reader->model->loadContent();
        $reader->model->content->loadContentType();

        $request = new HttpRequest('content');
        if ($request->hasValue()) {
            $reader->filter->andEqual($reader->model->contentId, $request->getValue());
        }

        $request = new HttpRequest('content-type');
        if ($request->hasValue()) {
            $reader->filter->andEqual($reader->model->content->contentTypeId, $request->getValue());
        }

        $reader->addOrder($reader->model->content->subject);

        foreach ($reader->getData() as $indexRow) {

            $data = [];
            $data['content_id'] = $indexRow->contentId;
            $data['content_type'] = $indexRow->content->contentType->contentType;
            $data['subject'] = $indexRow->content->subject;
            $data['text'] = $indexRow->description;
            $data['lat'] = $indexRow->coordinate->latitude;
            $data['lon'] = $indexRow->coordinate->longitude;
            $data['image_url'] = $indexRow->imageUrl;

            $this->addRow($data);

        }

    }

}