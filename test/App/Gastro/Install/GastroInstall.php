<?php

namespace Nemundo\ContentTest\App\Gastro\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Content\Index\Workflow\Setup\ProcessSetup;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\ContentTest\App\Gastro\Content\GastroErfassung\GastroErfassungType;
use Nemundo\ContentTest\App\Gastro\Content\GastroWorkflow\GastroWorkflowType;
use Nemundo\ContentTest\App\Gastro\Data\GastroModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;

class GastroInstall extends AbstractInstall
{
    public function install()
    {
        (new ModelCollectionSetup())->addCollection(new GastroModelCollection());

        (new ProcessSetup())
            ->addProcess(new GastroWorkflowType());

        (new ContentTypeSetup())
            ->addContentType(new GastroErfassungType());

    }
}