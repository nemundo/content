<?php
namespace Nemundo\Content\Translation\Install;
use Nemundo\Project\Install\AbstractInstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Content\Translation\Data\TranslationModelCollection;
use Nemundo\Content\Translation\Application\TranslationApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class TranslationInstall extends AbstractInstall {
public function install() {
(new ApplicationSetup())->addApplication(new TranslationApplication());
(new ModelCollectionSetup())->addCollection(new TranslationModelCollection());
}
}