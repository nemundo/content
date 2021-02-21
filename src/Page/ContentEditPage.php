<?php

namespace Nemundo\Content\Page;


use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererHiddenInput;
use Nemundo\Com\FormBuilder\UrlReferer\UrlRefererSite;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Parameter\ContentParameter;

class ContentEditPage extends AbstractTemplateDocument
{

    public function getContent()
    {

        $contentParameter = new ContentParameter();
        $contentParameter->contentTypeCheck = false;
        $contentType = $contentParameter->getContentType();

        $form = $contentType->getDefaultForm($this);
        new UrlRefererHiddenInput($form);
        $form->redirectSite = new UrlRefererSite();

        return parent::getContent();

    }

}