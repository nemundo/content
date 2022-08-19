<?php

namespace Nemundo\Content\Service;

use Nemundo\App\WebService\Service\AbstractListServiceRequest;
use Nemundo\Content\Data\Content\ContentPaginationReader;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Core\Http\Request\HttpRequest;
use Nemundo\Db\Sql\Field\CountField;
use Nemundo\Db\Sql\Order\SortOrder;

class ContentGroupService extends AbstractListServiceRequest
{

    protected function loadService()
    {
        $this->serviceName = 'content-group';
    }


    public function onRequest()
    {

        $reader = new ContentReader();
        $reader->model->loadContentType();
        //$reader->addOrder($reader->model->id, SortOrder::DESCENDING);
        $reader->addOrder($reader->model->subject);

        /*$request = new HttpRequest('content');
        if ($request->hasValue()) {
            $reader->filter->andEqual($reader->model->id, $request->getValue());
        }

        $request = new HttpRequest('content-type');
        if ($request->hasValue()) {
            $reader->filter->andEqual($reader->model->contentTypeId, $request->getValue());
        }*/

        $reader->addGroup($reader->model->contentTypeId);

        $count = new CountField($reader);


        foreach ($reader->getData() as $contentRow) {

            $data = [];
            $data['content_type_id'] = $contentRow->contentTypeId;
            $data['content_type'] = $contentRow->contentType->contentType;
            $data['count'] = $contentRow->getModelValue($count);

            //$groupText = $contentRow->contentType->contentType.' ('. $contentRow->getModelValue($count).')';
            $data['group_text']=$contentRow->contentType->contentType.' ('. $contentRow->getModelValue($count).')';



            $this->addRow($data);

        }

    }

}