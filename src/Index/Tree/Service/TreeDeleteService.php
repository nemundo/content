<?php

namespace Nemundo\Content\Index\Tree\Service;

use Nemundo\App\WebService\Service\AbstractListServiceRequest;
use Nemundo\Content\Index\Tree\Data\Tree\TreeDelete;
use Nemundo\Core\Http\Request\HttpRequest;


class TreeDeleteService extends AbstractListServiceRequest
{

    protected function loadService()
    {
        $this->serviceName = 'tree-delete';
    }


    public function onRequest()
    {

        $treeId = (new HttpRequest('tree'))->getValue();
        (new TreeDelete())->deleteById($treeId);

    }

}