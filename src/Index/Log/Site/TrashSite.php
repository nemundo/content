<?php

namespace Nemundo\Content\Index\Log\Site;

use Nemundo\Content\Index\Log\Page\TrashPage;
use Nemundo\Web\Site\AbstractSite;

class TrashSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Trash';
        $this->url = 'trash';
    }

    public function loadContent()
    {
        (new TrashPage())->render();
    }
}