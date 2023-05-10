<?php
namespace Nemundo\ContentTest\App\Poi\Install;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\ContentTest\App\Poi\Data\PoiModelCollection;
use Nemundo\ContentTest\App\Poi\Application\PoiApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class PoiInstall extends AbstractInstall {
public function install() {
(new ModelCollectionSetup())->addCollection(new PoiModelCollection());
}
}