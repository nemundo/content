<?php

namespace Nemundo\ContentTest\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\ContentTest\App\Poi\Data\PoiModelCollection;
use Nemundo\ContentTest\Workflow\Approval\ApprovalType;
use Nemundo\ContentTest\Workflow\Workflow\TestWorkflow;
use Nemundo\Model\Setup\ModelCollectionSetup;

class TestWorkflowInstall extends AbstractInstall
{

    public function install()
    {

        (new ModelCollectionSetup())
            ->addCollection(new PoiModelCollection());


        (new ContentTypeSetup())
            ->addContentType(new TestWorkflow())
            ->addContentType(new ApprovalType());

        /*(new ProcessSetup())
            ->addProcess(new TestProcess());*/


    }

}