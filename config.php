<?php

require 'vendor/autoload.php';

\Nemundo\Project\ProjectConfig::$projectPath = __DIR__ . DIRECTORY_SEPARATOR;

$config = new \Nemundo\Project\Config\ProjectConfigReader();
$config->filename = __DIR__ . '/config.ini';
$config->readFile();


\Nemundo\Model\ModelConfig::$redirectDataPath= \Nemundo\Project\ProjectConfig::$projectPath . 'admin' . DIRECTORY_SEPARATOR. 'data_redirect' . DIRECTORY_SEPARATOR;
\Nemundo\Model\ModelConfig::$dataPath= \Nemundo\Project\ProjectConfig::$projectPath . 'admin' . DIRECTORY_SEPARATOR. 'data' . DIRECTORY_SEPARATOR;

