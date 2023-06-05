<?php

namespace Nemundo\Content\Index\Workflow\Com\ListBox;

use Nemundo\Admin\Com\ListBox\AdminListBox;
use Nemundo\Content\Index\Workflow\Data\Process\ProcessReader;
use Nemundo\Content\Parameter\ContentTypeParameter;

class ProcessListBox extends AdminListBox
{


    protected function loadContainer()
    {

        $this->name = (new ContentTypeParameter())->getParameterName();

    }


    public function getContent()
    {

        $this->label = 'Process';

        $reader = new ProcessReader();
        $reader->model->loadContentType();
        foreach ($reader->getData() as $processRow) {
            $this->addItem($processRow->contentTypeId,$processRow->contentType->contentType);
        }

        return parent::getContent();

    }
}