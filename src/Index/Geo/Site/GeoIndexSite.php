<?php

namespace Nemundo\Content\Index\Geo\Site;

use Nemundo\Content\Index\Geo\Page\GeoIndexPage;
use Nemundo\Web\Site\AbstractSite;

// GeoSite
class GeoIndexSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Geo';
        $this->url = 'geo-index';
    }

    public function loadContent()
    {

        (new GeoIndexPage())->render();

    }
}