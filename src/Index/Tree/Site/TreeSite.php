<?php

namespace Nemundo\Content\Index\Tree\Site;

use Nemundo\Web\Site\AbstractSite;

class TreeSite extends AbstractSite
{

    /**
     * @var TreeSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Tree';
        $this->url = 'tree';
        $this->menuActive = false;

       /* new ViewEditSite($this);
        new ChildDeleteSite($this);*/

        (new ContentRemoveFromTreeSite($this));


    }

    public function loadContent()
    {

    }
}