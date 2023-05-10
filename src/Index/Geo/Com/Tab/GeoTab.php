<?php

namespace Nemundo\Content\Index\Geo\Com\Tab;

use Nemundo\Admin\Com\Tabs\AdminSiteTabs;
use Nemundo\Content\Index\Geo\Site\GeoIndexSite;

class GeoTab extends AdminSiteTabs
{

    public function getContent()
    {

        $this->site = GeoIndexSite::$site;
        return parent::getContent();

    }

}