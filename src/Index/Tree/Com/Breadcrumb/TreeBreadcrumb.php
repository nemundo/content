<?php


namespace Nemundo\Content\Index\Tree\Com\Breadcrumb;



use Nemundo\Content\App\Explorer\Site\ItemSite;
use Nemundo\Content\Com\Base\ContentTypeRedirectTrait;
use Nemundo\Content\Index\Tree\Reader\ParentContentTypeReader;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Debug\Debug;
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


        $reader=new ParentContentTypeReader();
        $reader->contentType = $contentType;
        foreach ($reader->getData() as $item) {

        //    (new Debug())->write('parent');

        //foreach ($contentType->getParentParentContentTypeList() as $parent) {

            $site = clone($this->redirectSite);
            $site->title = $item->getSubject();
            $site->addParameter(new ContentParameter($item->getContentId()));
            $this->addSite($site);

        }


            /*$site = clone($this->redirectSite);
            $site->title = $contentType->getSubject();
            $site->addParameter(new ContentParameter($contentType->getContentId()));
            $this->addSite($site);*/

        //}

        //$this->addActiveItem($contentType->getSubject());


    }


    public function addContentType(AbstractContentType $contentType) {

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