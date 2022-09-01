<?php

namespace Nemundo\Content\Package;

use Nemundo\Com\Package\Type\AbstractJsPackage;
use Nemundo\Content\ContentProject;

class ContentJsPackage extends AbstractJsPackage
{

    protected function loadPackage()
    {

        $this->project = new ContentProject();
        $this->packageName = 'content';
        $this->addJs('content.js');

    }

}