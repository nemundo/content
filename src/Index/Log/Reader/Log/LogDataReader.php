<?php

namespace Nemundo\Content\Index\Log\Reader\Log;

use Nemundo\Content\Index\Log\Data\Log\LogReader;

class LogDataReader extends LogReader
{

    use LogDataFilter;

    public function __construct()
    {
        parent::__construct();
        $this->loadModel();
    }


    public function getData()
    {
        $this->loadFilter();
        return parent::getData();
    }

}