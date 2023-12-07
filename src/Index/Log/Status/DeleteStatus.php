<?php

namespace Nemundo\Content\Index\Log\Status;

class DeleteStatus extends AbstractStatus
{

    protected function loadStatus()
    {
     $this->id = 3;
     $this->status = 'Delete';
    }

}