<?php

namespace Nemundo\Content\Site;

use Nemundo\Content\Page\ContentAdminItemPage;
use Nemundo\Web\Site\AbstractSite;

class ContentAdminItemSite extends AbstractSite
{

    protected function loadSite()
    {
        // TODO: Implement loadSite() method.
    }


    public function loadContent()
    {

        $page = new ContentAdminItemPage();
        $page->contentTypeId=$this->url;
        $page->render();

        // TODO: Implement loadContent() method.
    }


}