<?php

namespace Nemundo\Content\Index\Log\Com\Tab;

use Nemundo\Admin\Com\Tabs\AdminSiteTabs;
use Nemundo\Content\Index\Log\Site\LogSite;

class LogTab extends AdminSiteTabs
{

    public function getContent()
    {
        $this->site = LogSite::$site;
        return parent::getContent();
    }

}