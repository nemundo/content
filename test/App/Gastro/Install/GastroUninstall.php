<?php
namespace Nemundo\ContentTest\App\Gastro\Install;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\ContentTest\App\Gastro\Data\GastroModelCollection;
use Nemundo\ContentTest\App\Gastro\Application\GastroApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class GastroUninstall extends AbstractUninstall {
public function uninstall() {
(new ModelCollectionSetup())->removeCollection(new GastroModelCollection());
}
}