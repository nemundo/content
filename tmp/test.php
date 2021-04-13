<?php

require __DIR__ . '/../config.php';


/*
$delete = new \Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexDelete();
$delete->model->loadContent();
$delete->filter->andEqual($delete->model->content->contentTypeId, '123123');
$delete->delete();*/

//new \Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexReader()


(new \Nemundo\Content\Index\Geo\Index\GeoIndexBuilder(new \Nemundo\ContentTest\Index\Geo\TestGeoContentType()))->deleteAllIndex();

