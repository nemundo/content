<?php

namespace Nemundo\ContentTest\App\Poi\Content\Poi;

use Nemundo\Content\Type\AbstractContentBuilder;
use Nemundo\ContentTest\App\Poi\Data\Poi\Poi;
use Nemundo\Core\Type\Geo\AbstractGeoCoordinate;

class PoiBuilder extends AbstractContentBuilder
{

    public $poi;

    /**
     * @var AbstractGeoCoordinate
     */
    public $geoCoordinate;


    protected function loadBuilder()
    {
        $this->contentType = new PoiType();
    }

    protected function onCreate()
    {

        $data = new Poi();
        $data->poi = $this->poi;
        $data->geoCoordinate = $this->geoCoordinate;
        $this->dataId = $data->save();

    }

    protected function onUpdate()
    {
    }
}