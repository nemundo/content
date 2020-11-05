<?php


namespace Nemundo\Content\Admin\Site\Json;


use Nemundo\Content\App\Webcam\Content\Webcam\WebcamContentType;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Web\Site\AbstractJsonSite;

class ContentJsonSite extends AbstractJsonSite
{


    protected function loadSite()
    {

        $this->url='content-json';

    }


    protected function loadJson()
    {

        // http://localhost/dev/web/admin/content/content-json

        $reader = new ContentReader();
        //$reader->filter->andEqual($reader->model->contentTypeId,(new WebcamContentType())->typeId);
        $reader->filter->andEqual($reader->model->contentTypeId,(new ContentTypeParameter())->getValue());
        //$reader->limit=10;
        foreach ($reader->getData() as $contentRow) {

            $data=[];
            $data['content_id']=$contentRow->id;
            $data['subject']=$contentRow->subject;

            $this->addJsonRow($data);


        }


    }

}