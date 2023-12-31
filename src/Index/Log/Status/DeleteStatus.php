<?php

namespace Nemundo\Content\Index\Log\Status;



// InactiveStatus
class DeleteStatus extends AbstractStatus
{

    protected function loadStatus()
    {
     $this->id = 3;
     $this->status = 'Delete';
    }

}