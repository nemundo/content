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


    // wann braucht es da dataId???
    public function getContentType($dataId = null)
    {

        $contentType = (new ContentTypeReader())->getRowById($this->getValue())->getContentType($dataId);
        //$this->checkContentType($contentType);

        return $contentType;

    }

}