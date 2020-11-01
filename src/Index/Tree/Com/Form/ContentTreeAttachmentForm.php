<?php

namespace Nemundo\Content\Index\Tree\Com\Form;

use Nemundo\Content\Index\Tree\Writer\TreeWriter;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\FormElement\BootstrapListBox;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Content\Type\AbstractContentType;


// Two Way possible
// AttachTo


class ContentTreeAttachmentForm extends BootstrapForm
{

    /**
     * @var AbstractContentType
     */
    public $contentType;

    /**
     * @var BootstrapListBox
     */
    private $content;

    public function getContent()
    {

        // search box

        $this->content= new BootstrapListBox($this);
        $this->content->label = 'Content';
        $this->content->validation=true;

        $contentReader=new ContentReader();
        $contentReader->addOrder($contentReader->model->subject);
        foreach ($contentReader->getData() as $contentRow) {
            $this->content->addItem($contentRow->id,$contentRow->subject);
        }


        return parent::getContent();
    }


    protected function onSubmit()
    {

        $writer = new TreeWriter();
        $writer->parentId = $this->content->getValue();
        $writer->childId = $this->contentType->getContentId();
        $writer->write();

    }

}