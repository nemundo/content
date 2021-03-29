<?php
error_reporting(E_ALL);
require 'vendor/autoload.php';
\Nemundo\Project\ProjectConfig::$projectPath = __DIR__ . DIRECTORY_SEPARATOR;

(new \Nemundo\Admin\Loader\AdminMySqlProjectLoader())->loadProject();


/*

<?php

require 'vendor/autoload.php';

\Nemundo\Project\ProjectConfig::$projectPath = __DIR__ . DIRECTORY_SEPARATOR;

$config = new \Nemundo\Project\Config\ProjectConfigReader();
$config->filename = __DIR__ . '/config.ini';
$config->readFile();
*/