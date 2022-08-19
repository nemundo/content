<?php

namespace Nemundo\Content\Page;

use Nemundo\Admin\Template\PlainAdminResponsive;
use Nemundo\Html\Script\JavaScript;
use Nemundo\Html\Script\JavaScriptType;
use Nemundo\Web\WebConfig;

class TestPage extends PlainAdminResponsive
{
    public function getContent()
    {

        $script = new JavaScript($this);
        $script->type = JavaScriptType::MODULE;
        $script->addCodeLine('import WebConfig from "/js/html/Config/WebConfig.js";');
        $script->addCodeLine('WebConfig.webUrl = "' . WebConfig::$webUrl . '";');

        $script = new JavaScript($this);
        $script->type = JavaScriptType::MODULE;
        $script->defer = true;
        $script->src = '/js/content/ContentContainer.js';

        return parent::getContent();

    }
}