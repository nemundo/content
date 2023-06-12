<?php

namespace Nemundo\ContentTest\App\Poi\Content\PoiNew;

use Nemundo\Content\Builder\IndexBuilder;
use Nemundo\Content\Index\Workflow\Type\Status\AbstractStatusBuilder;
use Nemundo\ContentTest\App\Poi\Content\PoiWorkflow\PoiWorkflowBuilder;
use Nemundo\ContentTest\App\Poi\Content\PoiWorkflow\PoiWorkflowItem;
use Nemundo\ContentTest\App\Poi\Data\Poi\PoiUpdate;
use Nemundo\ContentTest\App\Poi\Data\PoiErfassung\PoiErfassung;
use Nemundo\ContentTest\App\Poi\Usergroup\PoiFreigabeUsergroup;

class PoiNewBuilder extends AbstractStatusBuilder
{

    public $poi;

    protected function loadBuilder()
    {

        $this->contentType = new PoiNewType();
    }


    protected function onCreate()
    {

        $builder = new PoiWorkflowBuilder();
        $builder->buildContent();
        $dataId = $builder->getDataId();
        $this->workflowId = $builder->getWorkflowId();


        $data = new PoiErfassung();
        $data->poi = $this->poi;
        $this->dataId = $data->save();

        $update = new PoiUpdate();
        $update->poi = $this->poi;
        $update->updateById($dataId);


        $processItem = new PoiWorkflowItem($dataId);
        (new IndexBuilder())->buildIndex($processItem);

        $processItem->changeUsergroupAssignment(new PoiFreigabeUsergroup());

    }


}