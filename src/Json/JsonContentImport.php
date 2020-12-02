<?php


namespace Nemundo\Content\Json;


use Nemundo\Content\Builder\ContentTypeBuilder;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Debug\Debug;
use Nemundo\Core\Json\Reader\JsonReader;

class JsonContentImport extends AbstractBase
{

    public function importJson($filename) {

        $reader = new JsonReader();
        $reader->fromFilename($filename);
        foreach ($reader->getData() as $json) {

            if (isset($json['content_type_id'])) {

                $typeId = $json['content_type_id'];
                $contentType = (new ContentTypeBuilder())->getContentType($typeId);

                //$data = $json['data'];

                foreach ($json['data'] as $data) {

                   // (new Debug())->write($data);


                  $contentType->importJson($data);

                }


            }

        }

    }

}