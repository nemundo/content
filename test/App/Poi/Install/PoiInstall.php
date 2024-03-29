<?php

namespace Nemundo\ContentTest\App\Poi\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\Application\ContentApplication;
use Nemundo\Content\Index\Log\Application\ContentLogApplication;
use Nemundo\Content\Index\Workflow\Setup\ProcessSetup;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\ContentTest\App\Poi\Application\PoiApplication;
use Nemundo\ContentTest\App\Poi\Content\Approval\ApprovalType;
use Nemundo\ContentTest\App\Poi\Content\Decline\DeclineType;
use Nemundo\ContentTest\App\Poi\Content\Poi\PoiType;
use Nemundo\ContentTest\App\Poi\Content\PoiEdit\PoiEditType;
use Nemundo\ContentTest\App\Poi\Content\PoiNew\PoiNewType;
use Nemundo\ContentTest\App\Poi\Content\PoiWorkflow\PoiProcess;
use Nemundo\ContentTest\App\Poi\Content\TestPoi\TestPoiType;
use Nemundo\ContentTest\App\Poi\Data\PoiModelCollection;
use Nemundo\ContentTest\App\Poi\Script\PoiTestScript;
use Nemundo\ContentTest\App\Poi\Usergroup\PoiFreigabeUsergroup;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\User\Setup\UsergroupSetup;

class PoiInstall extends AbstractInstall
{
    public function install()
    {

        (new ContentApplication())->installApp();
        //(new ContentLogApplication())->installApp();

        (new ModelCollectionSetup())
            ->addCollection(new PoiModelCollection());

        (new ScriptSetup(new PoiApplication()))
        ->addScript(new PoiTestScript());

        (new ProcessSetup())
            ->addProcess(new PoiProcess());

        (new UsergroupSetup())
        ->addUsergroup(new PoiFreigabeUsergroup());

        (new ContentTypeSetup())
            ->addContentType(new PoiType())
            ->addContentType(new TestPoiType())
            ->addContentType(new PoiProcess())
            ->addContentType(new PoiNewType())
            ->addContentType(new PoiEditType())
            ->addContentType(new ApprovalType())
            ->addContentType(new DeclineType());

    }
}