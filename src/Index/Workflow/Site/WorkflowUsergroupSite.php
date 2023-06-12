<?php

namespace Nemundo\Content\Index\Workflow\Site;

use Nemundo\Content\Index\Workflow\Page\WorkflowUsergroupPage;
use Nemundo\Web\Site\AbstractSite;

class WorkflowUsergroupSite extends AbstractSite
{

    /**
     * @var WorkflowUsergroupSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'WorkflowUsergroup';
        $this->url = 'WorkflowUsergroup';
        $this->menuActive=false;

        WorkflowUsergroupSite::$site=$this;

    }

    public function loadContent()
    {
        (new WorkflowUsergroupPage())->render();
    }
}