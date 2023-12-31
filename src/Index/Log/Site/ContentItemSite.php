<?php

namespace Nemundo\Content\Index\Log\Site;

use Nemundo\Content\Index\Log\Page\ContentItemPage;
use Nemundo\Web\Site\AbstractSite;

class ContentItemSite extends AbstractSite
{

    /**
     * @var ContentItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'ContentItem';
        $this->url = 'ContentItem';

        ContentItemSite::$site = $this;

    }

    public function loadContent()
    {
        (new ContentItemPage())->render();
    }
}