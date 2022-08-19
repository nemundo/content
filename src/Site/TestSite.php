<?php

namespace Nemundo\Content\Site;

use Nemundo\Content\Page\TestPage;
use Nemundo\Web\Site\AbstractSite;

class TestSite extends AbstractSite
{

    /**
     * @var TestSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Test';
        $this->url = 'test';
        TestSite::$site = $this;




    }

    public function loadContent()
    {
        //(new TestPage())->render();
    }
}