<?php
namespace Nemundo\Content\Index\Tree\Install;
use Nemundo\Project\Install\AbstractInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Content\Index\Tree\Data\TreeModelCollection;
use Nemundo\Content\Index\Tree\Application\TreeApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class TreeInstall extends AbstractInstall {
public function install() {
(new ApplicationSetup())->addApplication(new TreeApplication());
(new ModelCollectionSetup())->addCollection(new TreeModelCollection());
}
}