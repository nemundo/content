<?php


namespace Nemundo\Content\Row;

use Nemundo\Content\Index\Tree\Type\TreeTypeTrait;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Content\Data\ContentType\ContentTypeRow;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\MenuTrait;


class ContentTypeCustomRow extends ContentTypeRow
{

    public function getContentType($dataId = null)
    {

        $className = $this->phpClass;


        $contentType = null;
        if (class_exists($className)) {

            /** @var AbstractContentType|TreeTypeTrait $contentType */
            $contentType = new $className($dataId);

        } else {
            (new LogMessage())->writeError('Content Type is not registred. Class: ' . $className);
        }

        return $contentType;


    }

}