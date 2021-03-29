<?php

namespace Nemundo\Content\Page\Admin;


use Nemundo\Content\Com\Container\ContentTypeFormContainer;
use Nemundo\Content\Com\Form\ApplicationContentTypeSearchForm;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Template\ContentAdminTemplate;

class ContentNewPage extends ContentAdminTemplate
{

    public function getContent()
    {


        $form = new ApplicationContentTypeSearchForm($this);



        $parameter = new ContentTypeParameter();
        if ($parameter->hasValue()) {
            new ContentTypeFormContainer($this);
        }


        /*
        $listbox=new ContentTypeListBox();


        if ($listbox->hasValue()) {

        }
        $contentType = (new ContentTypeParameter())->getContentType();


       // $widget = new AdminWidget($this);
       // $widget->widgetTitle = $contentType->typeLabel;
/*

        $container = new ContentTypeFormContainer($widget);
        $container->contentType = $contentType;
        $container->redirectSite =  new UrlRefererSite();*/


        return parent::getContent();

    }

}