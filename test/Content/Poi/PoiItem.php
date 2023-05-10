<?php

namespace Nemundo\ContentTest\Content\Poi;

use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;
use Nemundo\Content\Type\AbstractContentItem;
use Nemundo\ContentTest\App\Poi\Data\Poi\PoiReader;
use Nemundo\ContentTest\App\Poi\Data\Poi\PoiRow;


class PoiItem extends AbstractContentItem
{

    use GeoIndexTrait;

    protected function loadItem()
    {
        $this->contentType = new PoiType();
    }

    protected function onDataRow()
    {
        $this->dataRow = (new PoiReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|PoiRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->poi;
    }


    public function getGeoCoordinate()
    {
        return $this->getDataRow()->geoCoordinate;
    }


}