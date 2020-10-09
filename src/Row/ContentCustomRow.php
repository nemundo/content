<?php


namespace Nemundo\Content\Row;

use Nemundo\Core\Log\LogMessage;
use Nemundo\Content\Data\Content\ContentRow;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\AbstractTreeContentType;
use Nemundo\Content\Type\MenuTrait;
use Nemundo\Content\Type\TreeContentType;

class ContentCustomRow extends ContentRow
{

    public $itemOrder;

    public function getContentType()
    {

        $className = $this->contentType->phpClass;

        $contentType = null;
        if (class_exists($className)) {

            /** @var AbstractContentType|AbstractTreeContentType|MenuTrait $contentType */
            $contentType = new $className($this->dataId);

        } else {

            (new LogMessage())->writeError('ContentCustomRow. Content Type is not registred. Class: ' . $className.' Content Id: '.$this->id);
            $contentType = new TreeContentType($this->dataId);

        }

        return $contentType;

    }

}