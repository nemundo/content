<?php

require __DIR__ . "/config.php";

(new \Nemundo\App\ModelDesigner\ModelDesignerConfig())->addProject(new \Nemundo\FrameworkProject());
(new \Nemundo\App\ModelDesigner\ModelDesignerConfig())->addProject(new \Nemundo\Content\ContentProject());

\Nemundo\Com\Html\Header\LibraryHeader::$documentTitle = (new \Nemundo\Content\ContentProject())->project;
