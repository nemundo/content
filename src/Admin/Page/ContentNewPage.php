<?php


namespace Nemundo\Content\Admin\Page;


use Nemundo\Content\Admin\Site\ContentNewSite;
use Nemundo\Content\Admin\Site\ContentSite;
use Nemundo\Content\Admin\Template\ContentTemplate;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Package\Bootstrap\Dropdown\BootstrapSiteDropdown;

class ContentNewPage extends ContentTemplate
{

    public function getContent()
    {


        $dropdown = new BootstrapSiteDropdown($this);

        $reader = new ContentTypeReader();
        $reader->addOrder($reader->model->contentType);
        foreach ($reader->getData() as $contentTypeRow) {

            $site = clone(ContentNewSite::$site);
            $site->title = $contentTypeRow->contentType;
            //$site->addParameter(new DataIdParameter());
            $site->addParameter(new ContentTypeParameter($contentTypeRow->id));

            $dropdown->addSite($site);

        }


        $contentTypeParameter = new ContentTypeParameter();
        if ($contentTypeParameter->exists()) {

            $contentType = (new ContentTypeReader())->getRowById($contentTypeParameter->getValue())->getContentType();

            $form = $contentType->getForm($this);
            $form->redirectSite= ContentSite::$site; /* ContentNewSite::$site;
            $form->redirectSite->addParameter(new ContentTypeParameter());*/


            //$form->parentId = $dataId;
            //$form->redirectSite = ContentItemSite::$site;
            //$form->appendParameter=true;

            //$form->redirectSite->addParameter(new DataIdParameter());
            //$form->redirectSite=new Site();

        }

        return parent::getContent();

    }

}