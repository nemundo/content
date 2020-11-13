<?php


namespace Nemundo\Content\Com\Container;


use Nemundo\App\Application\Type\AbstractApplication;
use Nemundo\Content\App\File\Content\Image\ImageContentType;
use Nemundo\Content\App\Text\Content\Text\TextContentType;
use Nemundo\Content\Com\Dropdown\ContentTypeDropdown;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Type\EventTrait;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Web\Site\Site;

class ContentTypeAddContainer extends AbstractHtmlContainer
{

    use EventTrait;


    /**
     * @var string
     */
    public $parentId;


    /**
     * @var AbstractSite
     */
    public $redirectSite;

    //use TreeTypeTrait;

    /**
     * @var AbstractApplication
     */
    //public $application;

    /**
     * @var AbstractApplication[]
     */
    private $applicationList = [];

    /**
     * @var AbstractTreeContentType[]
     */
    private $contentTypeList = [];


    public function addApplication(AbstractApplication $application)
    {
        $this->applicationList[] = $application;
        return $this;
    }

    public function addContentType(AbstractTreeContentType $contentType)
    {
        $this->contentTypeList[] = $contentType;
        return $this;
    }


    public function getContent()
    {

        if ($this->redirectSite == null) {
            $this->redirectSite = new Site();
        }


        /*
                $dropbox = new ApplicationContentTypeDropdown($this);
                $dropbox->application = $this->application;*/


        $dropdown = new ContentTypeDropdown($this);
        /*$dropdown->addContentType(new TextContentType());
        $dropdown->addContentType(new ImageContentType());*/

        foreach ($this->applicationList as $application) {

            $reader = new ContentTypeReader();
            $reader->filter->andEqual($reader->model->applicationId, $application->applicationId);
            //$reader->model->loadContentType();
            //$reader->filter->andEqual($reader->model->applicationId, $this->application->applicationId);
            //$reader->addOrder($reader->model->contentType->contentType);
            foreach ($reader->getData() as $contentTypeRow) {

                $dropdown->addContentType($contentTypeRow->getContentType());

                /*
                $site = new Site();
                $site->title = $contentTypeRow->contentType->contentType;
                $site->addParameter((new ContentTypeParameter($contentTypeRow->contentTypeId)));
                $this->addSite($site);*/

            }

        }


        foreach ($this->contentTypeList as $contentType) {
            $dropdown->addContentType($contentType);
        }


        $parameter = new ContentTypeParameter();
        if ($parameter->hasValue()) {

            $contentType = $parameter->getContentType();
            $contentType->parentId = $this->parentId;

            foreach ($this->eventList as $event) {
                $contentType->addEvent($event);
            }
            //$contentType->addEvent(new StreamEvent());

            $form = $contentType->getForm($this);
            $form->redirectSite = $this->redirectSite; //new Site();  // StreamSite::$site;

        }

        //$type = (new ContentTypeParameter())->getContentType();
        //$type->parentId = $wikiType->getContentId();
        //$form = $type->getForm($this);
        //$form->redirectSite = $this-> $wikiType->getViewSite();


        return parent::getContent(); // TODO: Change the autogenerated stub
    }

}