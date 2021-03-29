<?php


namespace Nemundo\Content\Com\ListBox;


use Nemundo\Content\Data\ContentView\ContentViewReader;

use Nemundo\Content\Parameter\ContentViewParameter;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;


class ViewListBox extends BootstrapListBox
{

    /**
     * @var AbstractContentType
     */
   // public $contentType;


    private $contentId;


    protected function loadContainer()
    {

        $this->label = 'View';
        $this->name = (new ContentViewParameter())->getParameterName();

        $this->emptyValueAsDefault=false;

    }


    public function getContent()
    {

        $reader = new ContentViewReader();
        $reader->filter->andEqual($reader->model->contentTypeId, $this->contentId);
        $reader->addOrder($reader->model->viewName);
        foreach ($reader->getData() as $viewRow) {
            $this->addItem($viewRow->id, $viewRow->viewName);
        }

        return parent::getContent();

    }


    public function fromContentId($contentId) {

        $this->contentId=$contentId;
        return $this;
    }

    public function fromContent(AbstractContentType $content) {

        $this->contentId=$this->contentType->getDataId();
        return $this;

    }



}