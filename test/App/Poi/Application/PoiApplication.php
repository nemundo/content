<?php
namespace Nemundo\ContentTest\App\Poi\Application;
use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\ContentTest\App\Poi\Data\PoiModelCollection;
use Nemundo\ContentTest\App\Poi\Install\PoiInstall;
use Nemundo\ContentTest\App\Poi\Install\PoiUninstall;
class PoiApplication extends AbstractApplication {
protected function loadApplication() {
$this->application = 'Poi';
$this->applicationId = 'fcc5ae7e-e2ee-4271-8dbb-85676e965844';
$this->modelCollectionClass =  PoiModelCollection::class;
$this->installClass =  PoiInstall::class;
$this->uninstallClass = PoiUninstall::class;
}
}