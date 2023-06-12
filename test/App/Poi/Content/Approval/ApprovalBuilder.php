<?php

namespace Nemundo\ContentTest\App\Poi\Content\Approval;

use Nemundo\Content\Index\Workflow\Type\Status\AbstractStatusBuilder;
use Nemundo\Content\Type\AbstractContentBuilder;
use Nemundo\ContentTest\App\Poi\Data\Approval\Approval;

class ApprovalBuilder extends AbstractStatusBuilder
{

    public $kommentar;

    public $workflowId;

    protected function loadBuilder()
    {
        $this->contentType = new ApprovalType();
    }

    protected function onCreate()
    {

        $data = new Approval();
        $data->kommentar = $this->kommentar;
        $this->dataId = $data->save();





    }

    protected function onUpdate()
    {
    }
}