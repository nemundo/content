<?php

namespace Nemundo\Content\Service;

use Nemundo\App\WebService\Service\AbstractListServiceRequest;
use Nemundo\Content\Data\Content\ContentCount;
use Nemundo\Core\Http\Request\HttpRequest;

// ContentSearchService
class ContentCountService extends AbstractListServiceRequest
{

    protected function loadService()
    {
        $this->serviceName = 'content-count';
    }


    public function onRequest()
    {

        $count = new ContentCount();
        $count->model->loadContentType();
        //$count->addOrder($count->model->id, SortOrder::DESCENDING);
        //$reader->addOrder($reader->model->subject);


        $request = new HttpRequest('content-type');
        if ($request->hasValue()) {
            $count->filter->andEqual($count->model->contentTypeId, $request->getValue());
        }

        $data = [];
        $data['count'] = $count->getCount();
        $data['count_text'] = $count->getFormatCount();

        $this->addRow($data);

    }

}