<?php

namespace Nemundo\ContentTest\Workflow\Process;

use Nemundo\Content\Index\Workflow\Type\AbstractProcess;

class TestProcess extends AbstractProcess
{

    protected function loadProcess()
    {

        $this->process = 'Test Process';

    }

}