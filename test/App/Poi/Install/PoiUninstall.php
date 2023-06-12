<?php

namespace Nemundo\ContentTest\App\Poi\Install;

use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\ContentTest\App\Poi\Data\PoiModelCollection;
use Nemundo\Model\Setup\ModelCollectionSetup;

class PoiUninstall extends AbstractUninstall
{
    public function uninstall()
    {
        (new ModelCollectionSetup())->removeCollection(new PoiModelCollection());
    }
}