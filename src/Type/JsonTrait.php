<?php


namespace Nemundo\Content\Type;


trait JsonTrait
{



    protected function loadJson() {



    }


    public function getJson()
    {

        $data['id'] = $this->dataId;
        $data['subject'] = $this->getSubject();

        return $data;

    }


}