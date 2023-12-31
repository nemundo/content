<?php

namespace Nemundo\Content\Index\Log\Site;

use Nemundo\Content\Index\Log\Page\ContentPage;
use Nemundo\Web\Site\AbstractSite;

class ContentSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Content';
        $this->url = 'content';

        new ContentItemSite($this);

    }

    public function loadContent()
    {
        (new ContentPage())->render();
    }
}