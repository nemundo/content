<?php


namespace Nemundo\Content\Form;


use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Debug\Debug;

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

        if ($this->appendContentParameter) {
            $this->redirectSite->addParameter((new ContentParameter($this->contentType->getContentId())));
        }

        parent::checkRedirect();

    }

}