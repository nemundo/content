<?php


namespace Nemundo\Content\Index\Tree\Com\Breadcrumb;



use Nemundo\Content\App\Explorer\Site\ItemSite;
use Nemundo\Content\Com\Base\ContentTypeRedirectTrait;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Package\Bootstrap\Breadcrumb\BootstrapBreadcrumb;

// nach Content/Index/Com

// TreeParentBreadcrumb
class TreeBreadcrumb extends BootstrapBreadcrumb
{

    use ContentTypeRedirectTrait;


    /**
     * @var AbstractTreeContentType
     */
    //public $contentType;

    /**
     * @var
     */
    //public $redirectSite;

    public function addParentContentType(AbstractContentType $contentType) {







        foreach ($contentType->getParentParentContentTypeList() as $parent) {

            $site = clone($this->redirectSite);
            $site->title = $parent->getSubject();
            $site->addParameter(new ContentParameter($parent->getContentId()));
            $this->addSite($site);

            /*$site = clone($this->redirectSite);
            $site->title = $contentType->getSubject();
            $site->addParameter(new ContentParameter($contentType->getContentId()));
            $this->addSite($site);*/

        }

        //$this->addActiveItem($contentType->getSubject());


    }


    public function addContentType(AbstractTreeContentType $contentType) {

            $site = clone($this->redirectSite);
            $site->title = $contentType->getSubject();
            $site->addParameter(new ContentParameter($contentType->getContentId()));
            $this->addSite($site);

    }



    public function getContent()
    {

        /*foreach ($this->contentType->getParentParentContentTypeList() as $parent) {
            $site = clone(ItemSite::$site);
            $site->title = $parent->getSubject();
            $site->addParameter(new ContentParameter($parent->getContentId()));
            $this->addSite($site);
        }
        $this->addActiveItem($this->contentType->getSubject());*/

        return parent::getContent();

    }

}