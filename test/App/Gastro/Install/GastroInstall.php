<?php
namespace Nemundo\ContentTest\App\Gastro\Install;
use Nemundo\App\Application\Type\Install\AbstractInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\ContentTest\App\Gastro\Data\GastroModelCollection;
use Nemundo\ContentTest\App\Gastro\Application\GastroApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class GastroInstall extends AbstractInstall {
public function install() {
(new ModelCollectionSetup())->addCollection(new GastroModelCollection());
}
}