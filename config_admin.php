<?php

require __DIR__ . "/config.php";

(new \Nemundo\App\ModelDesigner\ModelDesignerConfig())->addProject(new \Nemundo\FrameworkProject());
(new \Nemundo\App\ModelDesigner\ModelDesignerConfig())->addProject(new \Nemundo\Content\ContentProject());

\Nemundo\Web\ResponseConfig::$title = 'Content';
