<?php

use Nemundo\App\Script\Setup\ScriptSetup;
use Nemundo\Project\Install\ProjectInstall;
use Nemundo\Project\Reset\ProjectReset;
use Nemundo\User\Script\AdminUserScript;

require "config.php";


$reset = new ProjectReset();
$reset->reset();

(new ProjectInstall())->install();
(new ScriptSetup())->addScript(new AdminUserScript());

(new \Nemundo\App\ModelDesigner\Application\ModelDesignerApplication())->installApp();
(new \Nemundo\Content\Application\ContentApplication())->installApp();

$reset->remove();
