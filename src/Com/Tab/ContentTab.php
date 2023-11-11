<?php

namespace Nemundo\Content\Com\Tab;

use Nemundo\Admin\Com\Tabs\AdminSiteTabs;
use Nemundo\Content\Site\ContentSite;

class ContentTab extends AdminSiteTabs
{

    public function getContent()
    {
        $this->site = ContentSite::$site;
        return parent::getContent();
    }

}