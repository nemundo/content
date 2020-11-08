<?php


namespace Nemundo\Content\Admin\Site\Json;


use Nemundo\Content\App\Webcam\Content\Webcam\WebcamContentType;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Core\Json\Document\JsonResponse;
use Nemundo\Web\Site\AbstractJsonSite;

class ContentTypeJsonSite extends AbstractJsonSite
{

    /**
     * @var ContentTypeJsonSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url='content-type-json';
        ContentTypeJsonSite::$site=$this;

    }


    protected function loadJson()
    {

        $contentType=(new ContentTypeParameter())->getContentType(false);


        $json=[];
        $json['content_type']=$contentType->typeLabel;
        $json['content_type_id']=$contentType->typeId;


        $data=[];

        $reader=new ContentReader();
        $reader->model->loadContentType();
        $reader->filter->andEqual($reader->model->contentTypeId, $contentType->typeId);
        foreach ($reader->getData() as $contentRow) {

            $content = $contentRow->getContentType();
            $data[]= $content->getJson();

        }

        $json['data']=$data;


        $response=new JsonResponse();
        $response->addData($json);
        $response->render();




        /*
        $json=$contentType->getJson();


        $response=new JsonResponse();
        $response->addData($json);
        $response->render();



        // http://localhost/dev/web/admin/content/content-json

        /*$reader = new ContentReader();
        //$reader->filter->andEqual($reader->model->contentTypeId,(new WebcamContentType())->typeId);
        $reader->filter->andEqual($reader->model->contentTypeId,(new ContentTypeParameter())->getValue());
        //$reader->limit=10;
        foreach ($reader->getData() as $contentRow) {

            $data=[];
            $data['content_id']=$contentRow->id;
            $data['subject']=$contentRow->subject;

            $this->addJsonRow($data);


        }*/


    }

}