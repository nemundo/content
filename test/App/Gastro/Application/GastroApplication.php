<?php

namespace Nemundo\ContentTest\App\Gastro\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\ContentTest\App\Gastro\Data\GastroModelCollection;
use Nemundo\ContentTest\App\Gastro\Install\GastroInstall;
use Nemundo\ContentTest\App\Gastro\Install\GastroUninstall;
use Nemundo\ContentTest\App\Gastro\Site\GastroSite;

class GastroApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Gastro';
        $this->applicationId = 'de53499e-bad1-401b-996a-2c19232954a8';
        $this->modelCollectionClass = GastroModelCollection::class;
        $this->installClass = GastroInstall::class;
        $this->uninstallClass = GastroUninstall::class;
        $this->appSiteClass = GastroSite::class;

    }
}