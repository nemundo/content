<?php

require "config.php";

(new \Nemundo\Content\Application\ContentApplication())->reinstallApp();
(new \Nemundo\Content\Index\Log\Application\ContentLogApplication())->reinstallApp();

(new \Nemundo\Content\Index\Workflow\Application\WorkflowApplication())->reinstallApp();
(new \Nemundo\ContentTest\App\Poi\Application\PoiApplication())->reinstallApp();



$loop = new \Nemundo\Core\Structure\ForLoop();
$loop->minNumber = 1;
$loop->maxNumber = 200;
foreach ($loop->getData() as $number) {

    $builder = new \Nemundo\ContentTest\App\Poi\Content\TestPoi\TestPoiBuilder();
    $builder->poi = 'Poi Test ' . $number;
    $builder->description = 'Desctiption'. $number;
    $builder->buildContent();

}





/*
$loop = new \Nemundo\Core\Structure\ForLoop();
$loop->minNumber = 1;
$loop->maxNumber = 5;  // 200;
foreach ($loop->getData() as $number) {

    //$builder = new \Nemundo\ContentTest\App\Poi\Content\PoiNew\PoiNewBuilderWorkflow();
    $builder = new \Nemundo\ContentTest\App\Poi\Content\PoiWorkflow\PoiWorkflowBuilder();  // new \Nemundo\ContentTest\Content\Poi\PoiProcessBuilder();
    $builder->poi = 'Poi Test ' . $number;
    $builder->buildContent();


    /*$data = new \Nemundo\ContentTest\App\Poi\Data\Poi\Poi();
    $data->poi = 'Poi Test '.$number;
    $id = $data->save();

    $item = new \Nemundo\ContentTest\Content\Poi\PoiItem($id);
    (new \Nemundo\Content\Builder\IndexBuilder())->buildIndex($item);*/

//}




//(new \Nemundo\Content\Index\Log\Application\LogApplication())->installApp();
//(new \Nemundo\Content\Index\Workflow\Application\WorkflowApplication())->reinstallApp();

//(new \Nemundo\ContentTest\Install\TestWorkflowInstall())->install();


/*(new \Nemundo\Content\Application\ContentApplication())->reinstallApp();
(new \Nemundo\Content\Index\Workflow\Application\WorkflowApplication())->reinstallApp();*/

/*(new \Nemundo\ContentTest\App\Poi\Application\PoiApplication())->installApp();
(new \Nemundo\ContentTest\App\Gastro\Application\GastroApplication())->installApp();*/


/*$builder = new \Nemundo\ContentTest\App\Poi\Content\PoiNew\PoiNewBuilder();
$builder->poi = 'Poi Test 4';
$builder->buildContent();*/


//(new \Nemundo\ContentTest\App\Poi\Script\PoiTestScript())->run();


/*(new \Nemundo\ContentTest\Install\TestInstall())->install();

$loop = new \Nemundo\Core\Structure\ForLoop();
$loop->minNumber=1;
$loop->maxNumber=10;
foreach ($loop->getData() as $number) {

    $data = new \Nemundo\ContentTest\App\Poi\Data\Poi\Poi();
    $data->poi = 'Poi Test '.$number;
    $id = $data->save();

    $item = new \Nemundo\ContentTest\Content\Poi\PoiItem($id);
    (new \Nemundo\Content\Builder\IndexBuilder())->buildIndex($item);

}*/


//(new \Nemundo\Lunchgate\Application\LunchgateApplication())->reinstallApp();


/*(new \Nemundo\Lunchgate\Setup\OrtSetup())
    ->addOrt('Dallenwil')
    ->addOrt('Wolfenschiessen');


(new \Nemundo\Lunchgate\Import\RestaurantImport())->importData();*/

