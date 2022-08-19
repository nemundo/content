<?php

namespace Nemundo\Content\Service;

use Nemundo\App\WebService\Service\AbstractListServiceRequest;
use Nemundo\Content\Data\Content\ContentPaginationReader;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Http\Request\HttpRequest;
use Nemundo\Db\DbConfig;

class ContentSearchService extends AbstractListServiceRequest
{

    protected function loadService()
    {
        $this->serviceName = 'content-search';
    }


    public function onRequest()
    {

        /*
        DbConfig::$sqlDebug=true;
        (new Debug())->write($this->getSortingOrder());*/


        $reader = new ContentPaginationReader();
        $reader->model->loadContentType();
        //$reader->addOrder($reader->model->id, SortOrder::DESCENDING);
        //$reader->addOrder($reader->model->subject);

        switch ($this->getSortingField()) {

            case 'id':
                $reader->addOrder($reader->model->id, $this->getSortingOrder());
                break;

            case 'subject':
                $reader->addOrder($reader->model->subject, $this->getSortingOrder());
                break;

            default:
                //$reader->addOrder($reader->model->subject);
                break;

        }


        $request = new HttpRequest('content');
        if ($request->hasValue()) {
            $reader->filter->andEqual($reader->model->id, $request->getValue());
        }

        $request = new HttpRequest('content-type');
        if ($request->hasValue()) {
            $reader->filter->andEqual($reader->model->contentTypeId, $request->getValue());
        }

        $reader->currentPage = $this->getCurrentPage();
        $reader->paginationLimit = $this->getPaginationLimit();
        foreach ($reader->getData() as $contentRow) {

            $data = [];
            //$data['id'] = $contentRow->id;
            $data['content_id'] = $contentRow->id;
            $data['data_id'] = $contentRow->dataId;
            $data['subject'] = $contentRow->subject;
            $data['content_type_id'] = $contentRow->contentTypeId;
            $data['content_type'] = $contentRow->contentType->contentType;

            $this->addRow($data);

        }

    }

}