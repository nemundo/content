<?php

namespace Nemundo\Content\Index\Workflow\Site;

use Nemundo\Content\Index\Workflow\Page\WorkflowItemPage;
use Nemundo\Web\Site\AbstractSite;

class WorkflowItemSite extends AbstractSite
{

    /**
     * @var WorkflowItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'WorkflowItem';
        $this->url = 'WorkflowItem';
        $this->menuActive = false;

        WorkflowItemSite::$site = $this;

    }

    public function loadContent()
    {
        WorkflowSite::$site->showMenuAsActive = true;
        (new WorkflowItemPage())->render();
    }
}