<?php

namespace Nemundo\Content\Index\Log\Status;

class ActiveStatus extends AbstractStatus
{

    protected function loadStatus()
    {
        $this->id = 2;
        $this->status = 'Active';
    }

}