<?php


namespace Nemundo\Content\Index\Geo\Service;


use Nemundo\App\WebService\Service\AbstractListServiceRequest;
use Nemundo\App\WebService\Service\AbstractServiceRequest;
use Nemundo\Content\App\Tagging\Data\Tag\Tag;
use Nemundo\Content\Index\Geo\Action\GeoIndexContentAction;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndex;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexReader;
use Nemundo\Core\Http\Request\HttpRequest;
use Nemundo\Core\Type\Geo\GeoCoordinate;

class GeoIndexListService extends AbstractServiceRequest
{

    protected function loadService()
    {
        $this->serviceName='geo-list';
    }


    public function onRequest()
    {

        //$contentId = (new HttpRequest('content'))->getValue();


        $reader=new GeoIndexReader();

        $request = new HttpRequest('content');
        if ($request->hasValue()) {
        $reader->filter->andEqual($reader->model->contentId,$request->getValue());
        }



        foreach ($reader->getData() as $indexRow) {

            $data = [];
            $data['lat']=$indexRow->coordinate->latitude;
            $data['lon']=$indexRow->coordinate->longitude;

            $this->addRow($data);

        }

    }

}