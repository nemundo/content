<?php

namespace Nemundo\Content\Index\Tree\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\Index\Tree\Application\TreeIndexApplication;

class TreeCleanScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'tree-clean';
    }

    public function run()
    {

        (new TreeIndexApplication())->reinstallApp();

    }
}