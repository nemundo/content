<?php


namespace Nemundo\Content\Com\Dropdown;


use Nemundo\App\Application\Data\Application\ApplicationReader;
use Nemundo\Content\Data\ContentType\ContentTypeCount;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Parameter\ContentTypeParameter;
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

    public function getContent()
    {


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

}