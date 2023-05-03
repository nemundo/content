<?php

require __DIR__.'/../../config.php';

class TestContentType extends \Nemundo\Content\Type\AbstractContentType {

    protected function loadContentType()
    {

        $this->typeId='123';

        // TODO: Implement loadContentType() method.
    }

}


(new \Nemundo\Content\Index\Geo\Setup\GeoContentTypeSetup())->removeContentType(new TestContentType());
