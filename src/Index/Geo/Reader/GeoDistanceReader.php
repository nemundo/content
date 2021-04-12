<?php


namespace Nemundo\Content\Index\Geo\Reader;


use Nemundo\Content\Index\Geo\Data\Distance\DistanceReader;
use Nemundo\Core\Base\DataSource\AbstractDataSource;

class GeoDistanceReader extends AbstractDataSource
{


    public $contentId;


    public $limit=100;

    public function filterByDistance() {

    }


    protected function loadData()
    {


        $reader = new DistanceReader();
        $reader->model->loadContentTo();
        $reader->model->contentTo->loadContentType();
        $reader->filter->andEqual($reader->model->contentFromId, $this->contentId);
        $reader->addOrder($reader->model->distance);
        $reader->limit = $this->limit;

        foreach ($reader->getData() as $distanceRow) {

            $item = new GeoDistanceItem();
            $item->contentId = $distanceRow->contentToId;
            $item->distance = $distanceRow->distance;

            $this->addItem($item);

        }


    }


    /**
     * @return GeoDistanceItem[]
     */
    public function getData()
    {
        return parent::getData();
    }

}