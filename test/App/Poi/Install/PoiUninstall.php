<?php
namespace Nemundo\ContentTest\App\Poi\Install;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\ContentTest\App\Poi\Data\PoiModelCollection;
use Nemundo\ContentTest\App\Poi\Application\PoiApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class PoiUninstall extends AbstractUninstall {
public function uninstall() {
(new ModelCollectionSetup())->removeCollection(new PoiModelCollection());
}
}