<?php

namespace Nemundo\Content\Index\Geo\Service;

use Nemundo\App\WebService\Service\AbstractServiceRequest;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndex;
use Nemundo\Core\Http\Request\HttpRequest;
use Nemundo\Core\Type\Geo\GeoCoordinate;

class GeoPostService extends AbstractServiceRequest
{

    protected function loadService()
    {
        $this->serviceName = 'geo-post';
    }


    public function onRequest()
    {

        $contentId = (new HttpRequest('content'))->getValue();

        $coordinate = new GeoCoordinate();
        $coordinate->latitude = (new HttpRequest('lat'))->getValue();
        $coordinate->longitude = (new HttpRequest('lon'))->getValue();

        $data = new GeoIndex();
        $data->updateOnDuplicate = true;
        $data->place = 'place';
        $data->description = '';
        $data->imageUrl='';
        $data->coordinate = $coordinate;
        $data->contentId = $contentId;
        $data->save();

        $this->sendOkStatus();

    }

}