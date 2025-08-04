<?php

namespace Nemundo\Content\Index\Geo\Com\Tab;

use Nemundo\Admin\Com\Tab\AdminTab;
use Nemundo\Content\Index\Geo\Site\GeoIndexSite;

class GeoIndexTab extends AdminTab
{

    public function getContent()
    {

        $this->site = GeoIndexSite::$site;
        return parent::getContent();

    }

}