<?php


namespace Nemundo\Content\Parameter;


use Nemundo\Content\Check\ContentTypeCheckTrait;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Web\Parameter\AbstractUrlParameter;

class ContentTypeParameter extends AbstractUrlParameter
{

    use ContentTypeCheckTrait;


    protected function loadParameter()
    {
        $this->parameterName = 'content-type';
    }


    public function getContentType()
    {

        $contentType = (new ContentTypeReader())->getRowById($this->getValue())->getContentType();
        //$this->checkContentType($contentType);

        return $contentType;

    }

}