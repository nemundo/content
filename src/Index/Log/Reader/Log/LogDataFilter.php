<?php

namespace Nemundo\Content\Index\Log\Reader\Log;

trait LogDataFilter
{

    public $contentTypeId;

    public $dataId;


    private $filterLoaded = false;

    protected function loadModel()
    {

        $this->model->loadStatus()->loadContent()->loadUser();
        $this->model->content->loadContentType();

    }


    protected function loadFilter()
    {

        if (!$this->filterLoaded) {

            if ($this->contentTypeId !== null) {
                $this->filter->andEqual($this->model->content->contentTypeId, $this->contentTypeId);
            }

            if ($this->dataId !== null) {
                $this->filter->andEqual($this->model->content->dataId, $this->dataId);
            }

            $this->filterLoaded = true;

        }


    }


}