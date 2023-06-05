<?php

namespace Nemundo\Content\Index\Workflow\Setup;


use Nemundo\Content\Index\Workflow\Data\Process\Process;
use Nemundo\Content\Index\Workflow\Type\AbstractWorkflow;
use Nemundo\Content\Setup\AbstractContentTypeSetup;


class WorkflowSetup extends AbstractContentTypeSetup
{


    public function addWorkflow(AbstractWorkflow $workflow)
    {

        $data = new Process();
        $data->ignoreIfExists = true;
        $data->contentTypeId = $workflow->typeId;
        $data->save();

        parent::addContentType($workflow);

    }

}