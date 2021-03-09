<?php


namespace Nemundo\Content\Index\Geo\Type;


use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndex;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexDelete;
use Nemundo\Core\Type\Geo\AbstractGeoCoordinate;


trait GeoIndexTrait
{

    /**
     * @return AbstractGeoCoordinate
     */
    abstract public function getCoordinate();
    // getGeoCoordinate

    protected function saveGeoIndex()
    {

        $coordinate = $this->getCoordinate();

        if ($coordinate->hasValue()) {

            $data = new GeoIndex();
            $data->updateOnDuplicate = true;
            $data->place = $this->getPlace();
            $data->coordinate = $coordinate;
            $data->contentId = $this->getContentId();
            $data->save();
        }

    }



    protected function deleteGeoIndex() {


        $delete = new GeoIndexDelete();
        $delete->filter->andEqual($delete->model->contentId,$this->getContentId());
        $delete->delete();

    }




    // als Job???
    protected function saveDistance() {




    }



    public function getPlace()
    {
        return $this->getSubject();
    }

}