<?php


namespace Nemundo\Content\Com\Container;


use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Web\Site\AbstractSite;

class ContentTypeChildAdminContainer extends AbstractContainer
{

    /**
     * @var AbstractTreeContentType
     */
    public $contentType;

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    public function getContent()
    {

        $container = new ContentTypeSubmenuAddContainer($this);
        $container->parentId = $this->contentType->getContentId();
        $container->redirectSite=$this->redirectSite;

        $container = new SortableContentContainer($this);
        $container->contentType = $this->contentType;
        //$container->redirectSite=$this->redirectSite;

        return parent::getContent();

    }

}