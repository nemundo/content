<?php

namespace Nemundo\ContentTest\App\Gastro\Content\GastroWorkflow;

use Nemundo\Content\Index\Workflow\Type\Process\AbstractProcess;
use Nemundo\Content\Index\Workflow\Type\Process\AbstractProcessBuilder;
use Nemundo\Content\Type\AbstractContentBuilder;
use Nemundo\ContentTest\App\Gastro\Data\Gastro\Gastro;

class GastroWorkflowBuilder extends AbstractProcessBuilder
{
    protected function loadBuilder()
    {
        $this->contentType = new GastroWorkflowType();
    }

    protected function onCreate()
    {

        $data = new Gastro();
        $data->gastro='[tbd]';
        $this->dataId = $data->save();


    }

    protected function onUpdate()
    {
    }
}