<?php

namespace Nemundo\Content\Index\Log\Reader\Log;

use Nemundo\Content\Index\Log\Data\Log\LogPaginationReader;

class LogDataPaginationReader extends LogPaginationReader
{

    use LogDataFilter;


    public function __construct()
    {
        parent::__construct();
        $this->loadModel();
    }


    public function getTotalCount()
    {
        $this->loadFilter();
        return parent::getTotalCount(); // TODO: Change the autogenerated stub
    }


    public function getData()
    {

        $this->loadFilter();
        return parent::getData();

    }

}