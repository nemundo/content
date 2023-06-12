<?php

namespace Nemundo\ContentTest\App\Gastro\Content\GastroErfassung;

use Nemundo\Content\Builder\IndexBuilder;
use Nemundo\Content\Index\Workflow\Type\Status\AbstractStatusBuilder;
use Nemundo\Content\Type\AbstractContentBuilder;
use Nemundo\ContentTest\App\Gastro\Content\GastroWorkflow\GastroWorkflowBuilder;
use Nemundo\ContentTest\App\Gastro\Content\GastroWorkflow\GastroWorkflowItem;
use Nemundo\ContentTest\App\Gastro\Data\Gastro\Gastro;
use Nemundo\ContentTest\App\Gastro\Data\Gastro\GastroUpdate;
use Nemundo\ContentTest\App\Gastro\Data\GastroErfassung\GastroErfassung;
use Nemundo\ContentTest\App\Poi\Content\PoiWorkflow\PoiWorkflowBuilder;
use Nemundo\ContentTest\App\Poi\Content\PoiWorkflow\PoiWorkflowItem;

class GastroErfassungBuilder extends AbstractStatusBuilder
{

    public $gastro;

    protected function loadBuilder()
    {
        $this->contentType = new GastroErfassungType();
    }

    protected function onCreate()
    {

        $builder = new GastroWorkflowBuilder();
        $builder->buildContent();

        $dataId = $builder->getDataId();

        $this->workflowId = $builder->getWorkflowId();


        $data = new GastroErfassung();
        $data->gastro = $this->gastro;
        $this->dataId = $data->save();

        $update = new GastroUpdate();
        $update->gastro= $this->gastro;
        $update->updateById($dataId);

        $processItem = new GastroWorkflowItem($dataId);
        (new IndexBuilder())->buildIndex($processItem);


    }

    protected function onUpdate()
    {
    }
}