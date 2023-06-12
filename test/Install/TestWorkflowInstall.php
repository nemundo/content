<?php

namespace Nemundo\ContentTest\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Content\Index\Workflow\Setup\ProcessSetup;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\ContentTest\App\Poi\Content\PoiNew\PoiNewType;
use Nemundo\ContentTest\App\Poi\Content\PoiWorkflow\PoiProcess;
use Nemundo\ContentTest\App\Poi\Data\PoiModelCollection;
use Nemundo\ContentTest\Workflow\Approval\ApprovalType;
use Nemundo\ContentTest\Workflow\Workflow\TestProcess;
use Nemundo\Model\Setup\ModelCollectionSetup;

class TestWorkflowInstall extends AbstractInstall
{

    public function install()
    {

        (new ModelCollectionSetup())
            ->addCollection(new PoiModelCollection());


        (new ContentTypeSetup())
            ->addContentType(new PoiNewType())
            //->addContentType(new TestProcess())
            ->addContentType(new ApprovalType());


        (new ProcessSetup())
            ->addProcess(new PoiProcess());


    }

}