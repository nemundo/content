<?php


namespace Nemundo\Content\Install;


use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\Data\ContentCollection;
use Nemundo\Content\Index\Geo\Install\GeoIndexInstall;
use Nemundo\Content\Index\Group\Install\GroupInstall;
use Nemundo\Content\Index\Search\Install\SearchIndexInstall;
use Nemundo\Content\Script\ContentCheckScript;
use Nemundo\Content\Script\ContentUpdateScript;
use Nemundo\Content\Script\ReIndexScript;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Project\Install\AbstractInstall;

class ContentInstall extends AbstractInstall
{

    public function install()
    {

        $setup = new ModelCollectionSetup();
        $setup->addCollection(new ContentCollection());

        (new ScriptSetup())
            ->addScript(new ReIndexScript())
            ->addScript(new ContentUpdateScript())
            ->addScript(new ContentCheckScript());

        (new SearchIndexInstall())->install();
        (new GeoIndexInstall())->install();
        (new GroupInstall())->install();

    }

}