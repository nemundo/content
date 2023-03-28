<?php

namespace Nemundo\Content\Index\Geo\Index;

use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Index\Geo\Setup\GeoContentTypeSetup;
use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;
use Nemundo\Core\Base\AbstractBase;

class GeoIndexContentTypeUpdate extends AbstractBase
{

    public function updateContentType() {


        $reader = new ContentTypeReader();
        foreach ($reader->getData() as $contentTypeRow) {

            $contentType = $contentTypeRow->getContentType();

            $item = $contentType->getItem(0);
            if ($item->isObjectOfTrait(GeoIndexTrait::class)) {

                (new GeoContentTypeSetup())
                    ->addContentType($contentType);

            }

        }


    }

}