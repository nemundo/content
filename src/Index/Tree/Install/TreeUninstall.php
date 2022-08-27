<?php

namespace Nemundo\Content\Index\Tree\Install;

use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Content\Index\Tree\Data\TreeModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;

class TreeUninstall extends AbstractUninstall
{

    public function uninstall()
    {

        (new ModelCollectionSetup())
            ->removeCollection(new TreeModelCollection());

    }

}