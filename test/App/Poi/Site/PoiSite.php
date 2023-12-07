<?php

namespace Nemundo\ContentTest\App\Poi\Site;

use Nemundo\ContentTest\App\Poi\Page\PoiPage;
use Nemundo\Web\Site\AbstractSite;

class PoiSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Poi';
        $this->url = 'poi';
    }

    public function loadContent()
    {
        (new PoiPage())->render();
    }
}