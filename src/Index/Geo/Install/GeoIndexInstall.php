<?php


namespace Nemundo\Content\Index\Geo\Install;


use Nemundo\Model\Setup\ModelCollectionSetup;
use Nemundo\Content\Index\Geo\Data\GeoCollection;
use Nemundo\Project\Install\AbstractInstall;

class GeoIndexInstall extends AbstractInstall
{

    public function install()
    {

        $setup=new ModelCollectionSetup();
        $setup->addCollection(new GeoCollection());


    }

}