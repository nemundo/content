<?php

namespace Nemundo\Content\Service;


use Nemundo\App\WebService\Service\AbstractServiceRequest;
use Nemundo\Content\Type\AbstractContentType;

abstract class AbstractContentServiceRequest extends AbstractServiceRequest
{

    protected function sendContentOkStatus(AbstractContentType $contentType)
    {

        $row = [];
        $row['service'] = $this->serviceName;
        $row['status'] = 'OK';
        $row['id'] = $contentType->getDataId();
        $row['content_id'] = $contentType->getContentId();

        $this->addRow($row);

    }

}