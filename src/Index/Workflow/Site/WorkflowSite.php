<?php

namespace Nemundo\Content\Index\Workflow\Site;

use Nemundo\Content\Index\Workflow\Page\WorkflowPage;
use Nemundo\Web\Site\AbstractSite;

class WorkflowSite extends AbstractSite
{

    /**
     * @var WorkflowSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Workflow';
        $this->url = 'workflow';

        new WorkflowNewSite($this);
        new WorkflowItemSite($this);

        WorkflowSite::$site= $this;

    }

    public function loadContent()
    {
        (new WorkflowPage())->render();
    }
}