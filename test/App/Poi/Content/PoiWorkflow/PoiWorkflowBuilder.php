<?php

namespace Nemundo\ContentTest\App\Poi\Content\PoiWorkflow;

use Nemundo\Content\Index\Workflow\Action\WorkflowAction;
use Nemundo\Content\Index\Workflow\Type\Process\AbstractProcessBuilder;
use Nemundo\Content\Type\AbstractContentBuilder;
use Nemundo\ContentTest\App\Poi\Data\Poi\Poi;
use Nemundo\ContentTest\Content\Poi\PoiItem;
use Nemundo\ContentTest\Workflow\Workflow\TestProcess;

class PoiWorkflowBuilder extends AbstractProcessBuilder
{

    //public $poi;

    protected function loadBuilder()
    {
        $this->contentType = new PoiProcess();
    }


    protected function onCreate()
    {

        $data = new Poi();
        $data->poi ='[empty]';  // $this->poi;
        $this->dataId = $data->save();

        //$this->saveWorkflow();

        /*$item = new PoiWorkflowItem($this->dataId);
        (new WorkflowAction())->onAction($item);*/

    }


}