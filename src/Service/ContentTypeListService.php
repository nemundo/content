<?php


namespace Nemundo\Content\Service;


use Nemundo\Admin\Parameter\PageParameter;
use Nemundo\App\WebService\Service\AbstractServiceRequest;
use Nemundo\Content\Data\Content\ContentPaginationReader;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Parameter\LimitParameter;
use Nemundo\Core\Http\Request\HttpRequest;
use Nemundo\Db\Sql\Order\SortOrder;

class ContentTypeListService extends AbstractServiceRequest
{

    protected function loadService()
    {
        $this->serviceName='content-contenttype-list';
    }


    public function onRequest()
    {

        $reader = new ContentTypeReader();

        $request=new HttpRequest('application');
        if ($request->hasValue()) {
            $reader->filter->andEqual($reader->model->applicationId,$request->getValue());
        }

        $reader->addOrder($reader->model->contentType);
        foreach ($reader->getData() as $contentTypeRow) {

            $data = [];
            $data['id'] = $contentTypeRow->id;
            $data['content_type'] = $contentTypeRow->contentType;
            $this->addRow($data);

        }

    }

}