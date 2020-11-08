<?php


namespace Nemundo\Content\Admin\Site\Json;


use Nemundo\Content\App\Webcam\Content\Webcam\WebcamContentType;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Core\Json\Document\JsonResponse;
use Nemundo\Web\Site\AbstractJsonSite;

class ContentJsonSite extends AbstractJsonSite
{

    /**
     * @var ContentJsonSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->url='content-json';

        ContentJsonSite::$site=$this;

    }


    protected function loadJson()
    {

        $contentType=(new ContentParameter())->getContentType(false);

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