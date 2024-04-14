<?php

namespace Nemundo\Content\Reader;

trait ContentDataTrait
{

    protected function loadModel() {

        $this->model->loadContentType();

    }

}