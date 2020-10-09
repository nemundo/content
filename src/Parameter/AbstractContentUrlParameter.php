<?php


namespace Nemundo\Content\Parameter;


use Nemundo\Content\Check\ContentTypeCheckTrait;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Web\Parameter\AbstractUrlParameter;

abstract class AbstractContentUrlParameter extends AbstractUrlParameter
{

    use ContentTypeCheckTrait;

    public function getContentType($checkContentType = true)
    {

        $reader = new ContentReader();
        $reader->model->loadContentType();
        $contentRow = $reader->getRowById($this->getValue());
        $contentType = $contentRow->getContentType();

        if ($checkContentType) {
            $this->checkContentType($contentType);
        }

        return $contentType;

    }

}