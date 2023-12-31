<?php

use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Project\Install\ProjectInstall;
use Nemundo\Project\Reset\ProjectReset;
use Nemundo\User\Script\AdminUserScript;

require "config.php";

(new \Nemundo\Db\Provider\MySql\Database\MySqlDatabase())->createDatabase();

$reset = new ProjectReset();
$reset->reset();

(new ProjectInstall())->install();
(new ScriptSetup())->addScript(new AdminUserScript());

(new \Nemundo\App\ModelDesigner\Application\ModelDesignerApplication())->installApp();
(new \Nemundo\Content\Application\ContentApplication())->installApp();
(new \Nemundo\Content\Index\Geo\Application\GeoIndexApplication())->installApp();
//(new \Nemundo\Content\Index\Log\Application\ContentLogApplication())->installApp();
//(new \Nemundo\Content\Index\Workflow\Application\WorkflowApplication())->installApp();

(new \Nemundo\ContentTest\App\Poi\Application\PoiApplication())->installApp();
//(new \Nemundo\ContentTest\App\Gastro\Application\GastroApplication())->installApp();


$reset->remove();
