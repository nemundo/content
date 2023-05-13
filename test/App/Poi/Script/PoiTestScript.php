<?php

namespace Nemundo\ContentTest\App\Poi\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\Application\ContentApplication;
use Nemundo\Content\Index\Geo\Application\GeoIndexApplication;
use Nemundo\ContentTest\App\Poi\Data\PoiModelCollection;
use Nemundo\Core\Random\RandomNumber;
use Nemundo\Model\Setup\ModelCollectionSetup;

class PoiTestScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'poi-test';
    }

    public function run()
    {

        (new ModelCollectionSetup())
            ->removeCollection(new PoiModelCollection());

        (new ContentApplication())->installApp();
        (new GeoIndexApplication())->installApp();

        (new \Nemundo\ContentTest\Install\TestInstall())->install();


        $loop = new \Nemundo\Core\Structure\ForLoop();
        $loop->minNumber = 1;
        $loop->maxNumber = 30;
        foreach ($loop->getData() as $number) {

            $data = new \Nemundo\ContentTest\App\Poi\Data\Poi\Poi();
            $data->poi = 'Poi Test ' . $number;
            $data->geoCoordinate->latitude = (new RandomNumber())->getNumber();
            $data->geoCoordinate->longitude = (new RandomNumber())->getNumber();
            $id = $data->save();

            $item = new \Nemundo\ContentTest\Content\Poi\PoiItem($id);
            (new \Nemundo\Content\Builder\IndexBuilder())->buildIndex($item);

        }


        //46.96272417142313,8.366549825115726

        $data = new \Nemundo\ContentTest\App\Poi\Data\Poi\Poi();
        $data->poi = 'Stans';
        $data->geoCoordinate->latitude = 46.96272417142313;
        $data->geoCoordinate->longitude = 8.366549825115726;
        $id = $data->save();

        $item = new \Nemundo\ContentTest\Content\Poi\PoiItem($id);
        (new \Nemundo\Content\Builder\IndexBuilder())->buildIndex($item);




    }
}