<?php

namespace Nemundo\Content\Page;


use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\Content\Com\Container\ContentTypeFormContainer;
use Nemundo\Content\Com\Form\ApplicationContentTypeSearchForm;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Site\ContentSite;
use Nemundo\Content\Template\ContentAdminTemplate;
use Nemundo\Content\Template\ContentTemplate;

class ContentNewPage extends ContentTemplate
{

    public function getContent()
    {

        //$form = new ApplicationContentTypeSearchForm($this);

        $parameter = new ContentTypeParameter();
        if ($parameter->hasValue()) {

            $container = new ContentTypeFormContainer($this);
            $container->contentType=$parameter->getContentType();
            $container->redirectSite=clone(ContentSite::$site);
            $container->redirectSite->addParameter(new ApplicationParameter());
            $container->redirectSite->addParameter(new ContentTypeParameter());

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