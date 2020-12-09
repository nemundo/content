<?php


namespace Nemundo\Content\Com\Dropdown;


use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\Content\Collection\AbstractContentTypeCollection;
use Nemundo\Content\Data\ContentType\ContentTypeCount;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Package\BootstrapDropdown\BootstrapSubmenuDropdown;
use Nemundo\Package\BootstrapDropdown\Submenu;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\Site;

class ContentTypeCollectionSubmenuDropdown extends BootstrapSubmenuDropdown
{

    use ContentTypeDropdownTrait;

    /**
     * @var AbstractSite
     */
    public $redirectSite;


    public function addContentTypeCollection(AbstractContentTypeCollection $contentTypeCollection)
    {

        foreach ($contentTypeCollection->getContentTypeList() as $contentType) {

            /*$site = clone($this->redirectSite);
            $site->addParameter(new ContentTypeParameter($contentType->typeId));
            $site->title = $contentType->typeLabel;
            $this->addSite($site);*/

            $this->addSite($this->getMenuSite($contentType));

        }


    }


    public function addContentTypeCollectionAsSubmenu(AbstractContentTypeCollection $contentTypeCollection)
    {

        //foreach ($this->contentType->getRestrictedContentTypeCollectionList() as $child) {

            $submenu=new Submenu($this);
            $submenu->label =$contentTypeCollection->label;
            foreach ($contentTypeCollection->getContentTypeList() as $contentType2) {

                /*
                $site =  clone($this->redirectSite);
                $site->addParameter(new ContentTypeParameter($contentType2->typeId));
                $site->title = $contentType2->typeLabel;
                $submenu->addSite($site);*/

                $submenu->addSite($this->getMenuSite($contentType2));

            }

        //}


    }


    public function getContent()
    {


        /*
        if ($this->redirectSite == null) {
            $this->redirectSite = new Site();
        }

        foreach ($this->contentTypeList as $contentType) {
            $site = clone($this->redirectSite);
            $site->addParameter(new ContentTypeParameter($contentType->typeId));
            $site->title = $contentType->typeLabel;
            $this->addSite($site);
        }




        /*
        $applicationReader = new ApplicationReader();
        $applicationReader->addOrder($applicationReader->model->application);
        foreach ($applicationReader->getData() as $applicationRow) {

            $count = new ContentTypeCount();
            $count->filter->andEqual($count->model->applicationId, $applicationRow->id);
            if ($count->getCount() > 0) {

                $submenu = new Submenu($this);
                $submenu->label = $applicationRow->application;

                $reader = new ContentTypeReader();
                $reader->filter->andEqual($reader->model->applicationId, $applicationRow->id);
                foreach ($reader->getData() as $contentTypeRow) {

                    $site = clone($this->redirectSite);
                    $site->title = $contentTypeRow->contentType;
                    $site->addParameter(new ContentTypeParameter($contentTypeRow->id));

                    $submenu->addSite($site);

                }

            }

        }*/

        return parent::getContent();

    }



    private function getMenuSite(AbstractContentType $contentType) {

        $site = clone($this->redirectSite);
        $site->addParameter(new ContentTypeParameter($contentType->typeId));
        $site->title = $contentType->typeLabel;

        return $site;

    }



}