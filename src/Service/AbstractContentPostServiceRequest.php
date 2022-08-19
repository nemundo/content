<?php

namespace Nemundo\Content\Service;


use Nemundo\App\WebService\Service\AbstractServiceRequest;
use Nemundo\Core\Http\Request\HttpRequest;

abstract class AbstractContentPostServiceRequest extends AbstractServiceRequest
{

    protected function getDataId()
    {

        $dataId = null;

        $request = new HttpRequest('data_id');
        if ($request->hasValue()) {
            $dataId = $request->getValue();
        }

        return $dataId;

    }

}