<?php

require "config.php";

(new \Nemundo\Project\Install\ProjectInstall())->install();

(new \Nemundo\Content\Install\ContentApplicationInstall())->install();
(new \Nemundo\Content\Application\ContentApplication())->installApp()->setAppMenuActive();
