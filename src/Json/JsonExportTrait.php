<?php


namespace Nemundo\Content\Json;


trait JsonExportTrait
{


    // JsonExportTrait
    public function exportJson()
    {

        $data['id'] = $this->dataId;
        $data['subject'] = $this->getSubject();

        return $data;


    }


}