<?php


namespace Nemundo\Content\Template;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Site\Admin\ContentAdminSite;
use Nemundo\Content\Site\Admin\ContentListingSite;
use Nemundo\Content\Site\Admin\ContentNewSite;
use Nemundo\Content\Site\Admin\AllContentRemoveSite;
use Nemundo\Content\Site\Admin\ContentTypeSite;
use Nemundo\Content\Site\Admin\DebugSite;
use Nemundo\Content\Site\Json\JsonExportSite;


class ContentAdminTemplate extends AbstractTemplateDocument
{

    protected function loadContainer()
    {

        parent::loadContainer();

        $nav = new AdminNavigation($this);
        //$nav->site = ContentAdminSite::$site;

        $nav->addSite(ContentAdminSite::$site);
        $nav->addSite(ContentNewSite::$site);
        $nav->addSite(ContentListingSite::$site);
        $nav->addSite(ContentTypeSite::$site);
        $nav->addSite(DebugSite::$site);



        /*new ContentNewSite($this);
        new ContentListingSite($this);
        new ContentTypeSite($this);
        new DebugSite($this);*/
     /*   new AllContentRemoveSite($this);
        new JsonExportSite($this);*/



    }

}