<?php


namespace Nemundo\Content\Install;


use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\Index\Geo\Install\GeoIndexInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Content\Data\ContentCollection;
use Nemundo\Content\Script\ContentCheckScript;
use Nemundo\Content\Script\ContentUpdateScript;
use Nemundo\Project\Install\AbstractInstall;

class ContentInstall extends AbstractInstall
{

    public function install()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new ContentCollection());

        $setup = new ScriptSetup();
        $setup->addScript(new ContentUpdateScript());
        $setup->addScript(new ContentCheckScript());

        //(new ContentTestInstall())->install();

        (new GeoIndexInstall())->install();


    }

}