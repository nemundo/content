<?php

namespace Nemundo\ContentTest\App\Poi\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Content\Index\Workflow\Setup\WorkflowSetup;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\ContentTest\App\Poi\Content\Approval\ApprovalType;
use Nemundo\ContentTest\App\Poi\Content\Decline\DeclineType;
use Nemundo\ContentTest\App\Poi\Content\PoiWorkflow\PoiWorkflowType;
use Nemundo\ContentTest\App\Poi\Data\PoiModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;

class PoiInstall extends AbstractInstall
{
    public function install()
    {
        (new ModelCollectionSetup())
            ->addCollection(new PoiModelCollection());

        (new WorkflowSetup())
        ->addWorkflow(new PoiWorkflowType());

        (new ContentTypeSetup())
            ->addContentType(new PoiWorkflowType())
            ->addContentType(new ApprovalType())
            ->addContentType(new DeclineType());

    }
}