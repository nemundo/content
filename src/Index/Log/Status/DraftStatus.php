<?php

namespace Nemundo\Content\Index\Log\Status;

class DraftStatus extends AbstractStatus
{

    protected function loadStatus()
    {
     $this->id = 1;
     $this->status = 'Draft';
    }

}