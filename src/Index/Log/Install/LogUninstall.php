<?php

namespace Nemundo\Content\Index\Log\Install;

use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Content\Index\Log\Data\LogModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;

class LogUninstall extends AbstractUninstall
{

    public function uninstall()
    {

        (new ModelCollectionSetup())
            ->removeCollection(new LogModelCollection());

    }

}