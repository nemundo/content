<?php

namespace Nemundo\Content\Index\Workflow\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\Index\Workflow\Application\WorkflowApplication;

class CleanScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'workflow-clean';
    }

    public function run()
    {

        (new WorkflowApplication())->reinstallApp();

    }
}