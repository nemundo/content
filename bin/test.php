<?php

require "config.php";


/*(new \Nemundo\Content\Index\Log\Application\LogApplication())->installApp();
(new \Nemundo\Content\Index\Workflow\Application\WorkflowApplication())->installApp();*/

//(new \Nemundo\ContentTest\Install\TestWorkflowInstall())->install();







/*$builder = new \Nemundo\ContentTest\Content\Poi\PoiBuilder();
$builder->poi = 'Poi Test 1';
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

