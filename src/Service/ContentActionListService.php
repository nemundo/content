<?php


namespace Nemundo\Content\Service;


use Nemundo\App\WebService\Service\AbstractServiceRequest;
use Nemundo\Content\Data\ContentAction\ContentActionReader;

class ContentActionListService extends AbstractServiceRequest
{

    protected function loadService()
    {
        $this->serviceName = 'content-action-list';
    }


    public function onRequest()
    {

        $actionReader = new ContentActionReader();
        $actionReader->addOrder($actionReader->model->action);
        foreach ($actionReader->getData() as $actionRow) {

            $data = [];
            $data['action_id'] = $actionRow->id;
            $data['action'] = $actionRow->action;
            $this->addRow($data);

        }

    }

}