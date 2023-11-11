<?php

namespace Nemundo\Content\Index\Geo\Reader\GeoIndex;

trait GeoIndexFilterTrait
{

    public $subject;

    public $contentTypeId;


    public function loadModel() {

        $this->model->loadContent();
        $this->model->content->loadContentType();

    }


    public function loadFilter() {

        if ($this->subject!==null) {
            $this->filter->andContains($this->model->content->subject, $this->subject);
        }

        if ($this->contentTypeId !==null) {
            $this->filter->andEqual($this->model->content->contentTypeId, $this->contentTypeId);
        }

    }


}