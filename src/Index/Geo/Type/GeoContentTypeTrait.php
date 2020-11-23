<?php


namespace Nemundo\Content\Index\Geo\Type;


use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndex;


// GeoIndexTrait
trait GeoContentTypeTrait
{

    //abstract public function getPlace();

    abstract public function getCoordinate();


    protected function saveGeoIndex()
    {

        $data = new GeoIndex();
        $data->updateOnDuplicate=true;
        $data->place=$this->getPlace();
        $data->coordinate = $this->getCoordinate();
        $data->contentId=$this->getContentId();
        $data->save();

    }


    public function getPlace() {
        return $this->getSubject();
    }

}