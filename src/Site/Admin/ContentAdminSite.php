<?php


namespace Nemundo\Content\Site\Admin;


use Nemundo\Content\Page\Admin\ContentAdminPage;
use Nemundo\Content\Site\Json\JsonExportSite;
use Nemundo\Web\Site\AbstractSite;


class ContentAdminSite extends AbstractSite
{

    /**
     * @var ContentAdminSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Content';
        $this->url = 'content-admin';

        ContentAdminSite::$site = $this;

        new ContentNewSite($this);
        new ContentListingSite($this);
        new ContentTypeSite($this);
        new DebugSite($this);
        new AllContentRemoveSite($this);
        new JsonExportSite($this);


    }

    public function loadContent()
    {

        (new ContentAdminPage())->render();

    }


}