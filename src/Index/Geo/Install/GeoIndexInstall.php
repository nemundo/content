<?php


namespace Nemundo\Content\Index\Geo\Install;


use Nemundo\App\Application\Setup\ApplicationSetup;
use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\Index\Geo\Application\GeoApplication;
use Nemundo\Content\Index\Geo\Data\GeoCollection;
use Nemundo\Content\Index\Geo\Script\GeoIndexCleanScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;

class GeoIndexInstall extends AbstractInstall
{

    public function install()
    {

        (new ApplicationSetup())
            ->addApplication(new GeoApplication());

        (new ModelCollectionSetup())
            ->addCollection(new GeoCollection());

        (new ScriptSetup(new GeoApplication()))
            ->addScript(new GeoIndexCleanScript());


    }

}