<?php


namespace Nemundo\Content\Form;


use Nemundo\Admin\Com\Form\AbstractAdminForm;

abstract class AbstractContentForm extends AbstractAdminForm
{

    use ContentFormTrait;

    public $formName = 'New';

    public function getContent()
    {

        if ($this->contentType->existItem()) {
            $this->loadUpdateForm();
        }

        return parent::getContent();

    }


    protected function checkRedirect()
    {

        if ($this->appendParameter) {
            $this->redirectSite->addParameter($this->contentType->getParameter());
        }

        parent::checkRedirect();

    }


}