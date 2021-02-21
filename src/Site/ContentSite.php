<?php


namespace Nemundo\Content\Site;


use Nemundo\Content\Page\ContentPage;
use Nemundo\Web\Site\AbstractSite;

class ContentSite extends AbstractSite
{

    /**
     * @var ContentSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Content';
        $this->url = 'content';

        ContentSite::$site = $this;

        new ContentViewSite($this);
        new ContentEditSite($this);
        new ContentDeleteSite($this);

    }

    public function loadContent()
    {

        (new ContentPage())->render();

    }


}