<?php

namespace Nemundo\Content\Type;

use Nemundo\Core\Base\AbstractBase;

abstract class AbstractContentBackup extends AbstractBase
{

    abstract public function importData();


    abstract public function exportData();


}