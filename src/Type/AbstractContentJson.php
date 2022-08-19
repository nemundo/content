<?php

namespace Nemundo\Content\Type;

use Nemundo\Core\Base\AbstractBase;


// ImportExport
// AbstractContentBackup
abstract class AbstractContentJson extends AbstractBase
{

    abstract public function importJson();

    abstract public function exportJson();

}