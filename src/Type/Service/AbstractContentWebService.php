<?php


namespace Nemundo\Content\Type\Service;


use Nemundo\Core\Base\AbstractBase;

abstract class AbstractContentWebService extends AbstractBase
{

    abstract public function onSave();

}