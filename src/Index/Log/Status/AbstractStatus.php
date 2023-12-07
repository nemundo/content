<?php

namespace Nemundo\Content\Index\Log\Status;

use Nemundo\Core\Base\AbstractBase;



// LogStatus
abstract class AbstractStatus extends AbstractBase
{

    public $id;

    public $status;

    abstract protected function loadStatus();

    public function __construct()
    {

        $this->loadStatus();

    }

}