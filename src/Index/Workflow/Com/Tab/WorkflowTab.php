<?php

namespace Nemundo\Content\Index\Workflow\Com\Tab;

use Nemundo\Admin\Com\Tabs\AdminSiteTabs;
use Nemundo\Content\Index\Workflow\Site\WorkflowLogSite;
use Nemundo\Content\Index\Workflow\Site\WorkflowSite;

class WorkflowTab extends AdminSiteTabs
{

    public function getContent()
    {
        $this->site= WorkflowSite::$site;
        return parent::getContent();
    }

}