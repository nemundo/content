<?php

require "config.php";


//(new \Nemundo\Lunchgate\Application\LunchgateApplication())->reinstallApp();


(new \Nemundo\Lunchgate\Setup\OrtSetup())
    ->addOrt('Dallenwil')
    ->addOrt('Wolfenschiessen');


(new \Nemundo\Lunchgate\Import\RestaurantImport())->importData();

