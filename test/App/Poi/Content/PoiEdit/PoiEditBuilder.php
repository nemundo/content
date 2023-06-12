<?php

namespace Nemundo\ContentTest\App\Poi\Content\PoiEdit;

use Nemundo\Content\Builder\IndexBuilder;
use Nemundo\Content\Index\Workflow\Type\Status\AbstractStatusBuilder;
use Nemundo\Content\Type\AbstractContentBuilder;
use Nemundo\ContentTest\App\Poi\Content\PoiWorkflow\PoiWorkflowBuilder;
use Nemundo\ContentTest\App\Poi\Content\PoiWorkflow\PoiWorkflowItem;
use Nemundo\ContentTest\App\Poi\Data\Poi\PoiUpdate;
use Nemundo\ContentTest\App\Poi\Data\PoiErfassung\PoiErfassung;

class PoiEditBuilder extends AbstractStatusBuilder
{

    public $poi;

    protected function loadBuilder()
    {
        $this->contentType = new PoiEditType();
    }

    protected function onCreate()
    {

        /*$builder = new PoiWorkflowBuilder();
        $builder->buildContent();

        $dataId = $builder->getDataId();

        $this->workflowId = $builder->getWorkflowId();*/



        //(new Debug())->write($dataId);


        $data = new PoiErfassung();
        $data->poi = $this->poi;
        $this->dataId = $data->save();

        /*$update = new PoiUpdate();
        $update->poi = $this->poi;
        $update->updateById($dataId);*/



        /*$item = new PoiNewItem($this->dataId);
        (new WorkflowLogAction())->onAction($item);*/


        /*$processItem = new PoiWorkflowItem($dataId);
        (new IndexBuilder())->buildIndex($processItem);*/



    }

    protected function onUpdate()
    {
    }
}