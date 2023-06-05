<?php

namespace Nemundo\Content\Index\Workflow\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\Index\Workflow\Data\WorkflowModelCollection;
use Nemundo\Content\Index\Workflow\Install\WorkflowInstall;
use Nemundo\Content\Index\Workflow\Install\WorkflowUninstall;
use Nemundo\Content\Index\Workflow\Site\WorkflowSite;

class WorkflowApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Workflow';
        $this->applicationId = 'ff5caff7-e222-4b9a-b529-924660886a7a';
        $this->modelCollectionClass = WorkflowModelCollection::class;
        $this->installClass = WorkflowInstall::class;
        $this->uninstallClass = WorkflowUninstall::class;
        $this->appSiteClass = WorkflowSite::class;
    }
}