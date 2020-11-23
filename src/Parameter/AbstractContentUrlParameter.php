<?php


namespace Nemundo\Content\Parameter;


use Nemundo\Content\Builder\ContentBuilder;
use Nemundo\Content\Check\ContentTypeCheckTrait;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Web\Parameter\AbstractUrlParameter;

abstract class AbstractContentUrlParameter extends AbstractUrlParameter
{

    use ContentTypeCheckTrait;


    // auslagenrn in Object ContentTypeBuilder

    public function getContentType($checkContentType = true)
    {

        /*$reader = new ContentReader();
        $reader->model->loadContentType();
        $contentRow = $reader->getRowById($this->getValue());
        $contentType = $contentRow->getContentType();*/

        $contentType=(new ContentBuilder())->getContent($this->getValue());

        if ($checkContentType) {
            $this->checkContentType($contentType);
        }

        return $contentType;

    }

}