<?php

namespace Nemundo\Content\Site;

use Nemundo\Content\Page\ActionPage;
use Nemundo\Web\Site\AbstractSite;

class ActionSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Action';
        $this->url = 'action';
    }

    public function loadContent()
    {
        (new ActionPage())->render();
    }
}