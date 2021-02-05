<?php

namespace Nemundo\Content\Index\Relation\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\Index\Relation\Data\RelationModelCollection;
use Nemundo\Content\Index\Relation\Install\RelationInstall;

class RelationApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Relation';
        $this->applicationId = '8ab988e9-9363-4ac1-a195-ed8467e5525d';
        $this->modelCollectionClass = RelationModelCollection::class;
        $this->installClass = RelationInstall::class;
    }
}