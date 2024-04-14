<?php

namespace Nemundo\Content\Com\Tab;

use Nemundo\Admin\Com\Tab\AdminTab;
use Nemundo\Content\Site\ContentSite;

class ContentTab extends AdminTab
{

    public function getContent()
    {
        $this->site = ContentSite::$site;
        return parent::getContent();
    }

}