<?php

namespace Nemundo\ContentTest\Install;

use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\ContentTest\App\Poi\Data\PoiModelCollection;
use Nemundo\ContentTest\Content\Poi\PoiType;
use Nemundo\Model\Setup\ModelCollectionSetup;

class TestInstall extends AbstractInstall
{

    public function install()
    {

        (new ModelCollectionSetup())
            ->addCollection(new PoiModelCollection());

        (new ContentTypeSetup())
            ->addContentType(new PoiType());



    }

}