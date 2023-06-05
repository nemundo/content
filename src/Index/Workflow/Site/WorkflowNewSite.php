<?php

namespace Nemundo\Content\Index\Workflow\Site;

use Nemundo\Content\Index\Workflow\Page\WorkflowNewPage;
use Nemundo\Web\Site\AbstractSite;

class WorkflowNewSite extends AbstractSite
{

    /**
     * @var WorkflowNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'WorkflowNew';
        $this->url = 'WorkflowNew';

        WorkflowNewSite::$site = $this;

    }

    public function loadContent()
    {
        (new WorkflowNewPage())->render();
    }
}