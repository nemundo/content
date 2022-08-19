<?php


namespace Nemundo\Content\Index\Log\Service;


use Nemundo\App\WebService\Service\AbstractServiceRequest;
use Nemundo\Content\Index\Log\Data\Log\LogReader;
use Nemundo\Core\Http\Request\HttpRequest;

class LogService extends AbstractServiceRequest
{

    protected function loadService()
    {
        $this->serviceName = 'content-log';
    }


    public function onRequest()
    {

        $contentId = (new HttpRequest('content'))->getValue();

        $reader = new LogReader();
        $reader->model->loadUser();
        $reader->filter->andEqual($reader->model->contentId, $contentId);
        foreach ($reader->getData() as $logRow) {

            $data = [];
            $data['user'] = $logRow->user->login;
            $data['datetime'] = $logRow->dateTime->getIsoDateTime();

            $this->addRow($data);

        }


    }

}