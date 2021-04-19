<?php

namespace Nemundo\Content\Index\Geo\Site\Kml;

use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Kml\Document\KmlDocument;
use Nemundo\Kml\Object\KmlMarker;
use Nemundo\Package\FontAwesome\Site\AbstractKmlIconSite;

class GeoIndexKmlSite extends AbstractKmlIconSite
{

    /**
     * @var GeoIndexKmlSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Kml';
        $this->url = 'kml';

        GeoIndexKmlSite::$site = $this;

    }


    public function loadContent()
    {

        $kml = new KmlDocument();
        $kml->filename = 'geoindex.kml';

        $reader = new GeoIndexReader();
        $reader->model->loadContent();
        $reader->model->content->loadContentType();

        $contentTypeParameter = new ContentTypeParameter();
        if ($contentTypeParameter->hasValue()) {
            $reader->filter->andEqual($reader->model->content->contentTypeId, $contentTypeParameter->getValue());
        }

        $contentParameter = new ContentParameter();
        if ($contentParameter->hasValue()) {
            $reader->filter->andEqual($reader->model->contentId, $contentParameter->getValue());
        }

        foreach ($reader->getData() as $geoIndexRow) {

            $placemark = new KmlMarker($kml);
            $placemark->label = $geoIndexRow->content->subject;
            $placemark->coordinate = $geoIndexRow->coordinate;

            $contentType = $geoIndexRow->content->getContentType();
            if ($contentType->hasView()) {

                $view = $contentType->getDefaultView();
                $placemark->description = $view->getContent()->bodyContent;

            }

        }

        $kml->render();


    }

}