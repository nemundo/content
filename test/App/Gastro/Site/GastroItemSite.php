<?php

namespace Nemundo\ContentTest\App\Gastro\Site;

use Nemundo\ContentTest\App\Gastro\Page\GastroItemPage;
use Nemundo\Web\Site\AbstractSite;

class GastroItemSite extends AbstractSite
{

    /**
     * @var GastroItemSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'GastroItem';
        $this->url = 'GastroItem';
        $this->menuActive = false;
        GastroItemSite::$site = $this;
    }

    public function loadContent()
    {
        (new GastroItemPage())->render();
    }
}