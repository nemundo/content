<?php

namespace Nemundo\Content\Reader;

use Nemundo\Content\Data\Content\ContentPaginationReader;

class ContentDataPaginationReader extends ContentPaginationReader
{

    use ContentDataTrait;

    public function __construct()
    {
        parent::__construct();
        $this->loadModel();
    }

}