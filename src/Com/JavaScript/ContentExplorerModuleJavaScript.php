<?php

namespace Nemundo\Content\Com\JavaScript;

use Nemundo\Com\JavaScript\Module\ModuleJavaScript;

class ContentExplorerModuleJavaScript extends ModuleJavaScript
{

    public function getContent()
    {
        $this->src='/js/content/content_explorer.js';
        return parent::getContent();
    }

}