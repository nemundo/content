<?php

namespace Nemundo\ContentTest\App\Gastro\Site;

use Nemundo\ContentTest\App\Gastro\Page\GastroPage;
use Nemundo\Web\Site\AbstractSite;

class GastroSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Gastro';
        $this->url = 'gastro';

        new GastroItemSite($this);

    }

    public function loadContent()
    {
        (new GastroPage())->render();
    }
}