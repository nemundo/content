<?php

namespace Nemundo\Content\Index\Workflow\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Content\Index\Workflow\Data\WorkflowModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;

class WorkflowInstall extends AbstractInstall
{
    public function install()
    {

        (new ModelCollectionSetup())->addCollection(new WorkflowModelCollection());

    }
}