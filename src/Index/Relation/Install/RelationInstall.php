<?php
namespace Nemundo\Content\Index\Relation\Install;
use Nemundo\Project\Install\AbstractInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Content\Index\Relation\Data\RelationModelCollection;
use Nemundo\Content\Index\Relation\Application\RelationApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class RelationInstall extends AbstractInstall {
public function install() {
(new ApplicationSetup())->addApplication(new RelationApplication());
(new ModelCollectionSetup())->addCollection(new RelationModelCollection());
}
}