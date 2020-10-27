<?php


namespace Nemundo\Content\Index\Group\Install;


use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Content\Index\Group\Script\GroupUpdateScript;
use Nemundo\Content\Index\Group\User\UserGroupType;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Content\Index\Group\Data\GroupCollection;
use Nemundo\Content\Index\Group\Setup\GroupSetup;
use Nemundo\Content\Index\Group\Type\GroupContentType;

use Nemundo\Project\Install\AbstractInstall;


class GroupInstall extends AbstractInstall
{

    public function install()
    {

        (new ModelCollectionSetup())
            ->addCollection(new GroupCollection());


        (new GroupSetup())
            ->addGroupType(new UserGroupType());

        (new ScriptSetup())
            ->addScript(new GroupUpdateScript());


        /*
        (new GroupSetup())
            ->addGroupType(new GroupContentType())
            ->addGroupType(new UserGroupType());


        /*
        (new ScriptSetup())
            ->addScript(new GroupCleanScript());

        $setup = new ScriptSetup();
        $setup->addScript(new GroupCheckScript());
        $setup->addScript(new GroupTestScript());*/

    }

}