<?php

namespace Nemundo\ContentTest\App\Poi\Content\PoiWorkflow;

use Nemundo\Content\Type\AbstractContentBuilder;
use Nemundo\ContentTest\App\Poi\Data\Poi\Poi;
use Nemundo\ContentTest\Workflow\Workflow\TestWorkflow;

class PoiWorkflowBuilder extends AbstractContentBuilder
{

    public $poi;

    protected function loadBuilder()
    {
        $this->contentType = new PoiWorkflowType();
    }


    protected function onCreate()
    {

        $data = new Poi();
        $data->poi = $this->poi;
        $this->dataId = $data->save();

        //$this->saveWorkflow();

    }


}