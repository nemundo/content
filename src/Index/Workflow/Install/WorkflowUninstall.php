<?php
namespace Nemundo\Content\Index\Workflow\Install;
use Nemundo\App\Application\Type\Install\AbstractUninstall;
use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Content\Index\Workflow\Data\WorkflowModelCollection;
use Nemundo\Content\Index\Workflow\Application\WorkflowApplication;
use Nemundo\App\Application\Setup\ApplicationSetup;
class WorkflowUninstall extends AbstractUninstall {
public function uninstall() {
(new ModelCollectionSetup())->removeCollection(new WorkflowModelCollection());
}
}