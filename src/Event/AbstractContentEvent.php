<?php


namespace Nemundo\Content\Event;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\AbstractType;

abstract class AbstractContentEvent extends AbstractBase
{

    public function onCreate(AbstractType $contentType) {

    }


    public function onUpdate(AbstractType $contentType) {

    }

}