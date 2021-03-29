<?php


namespace Nemundo\Content\Site\Admin;


use Nemundo\Content\Page\Admin\ContentNewPage;
use Nemundo\Web\Site\AbstractSite;


class ContentNewSite extends AbstractSite
{

    /**
     * @var ContentNewSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'New';
        $this->url = 'content-new';
        $this->menuActive=false;

        ContentNewSite::$site = $this;
    }


    public function loadContent()
    {

        (new ContentNewPage())->render();

    }

}