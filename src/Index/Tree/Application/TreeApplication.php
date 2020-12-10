<?php

namespace Nemundo\Content\Index\Tree\Application;

use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\Index\Tree\Data\TreeModelCollection;

class TreeApplication extends AbstractApplication
{
    protected function loadApplication()
    {
        $this->application = 'Tree';
        $this->applicationId = 'fa2aff01-5c1d-4aa0-89b1-23de36ea6230';
        $this->modelCollectionClass = TreeModelCollection::class;
    }
}