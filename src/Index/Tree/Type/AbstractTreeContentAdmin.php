<?php


namespace Nemundo\Content\Index\Tree\Type;


use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Blog\Site\Admin\BlogContentSite;
use Nemundo\Content\App\Explorer\Site\ExplorerSite;
use Nemundo\Content\App\Explorer\Site\ItemNewSite;
use Nemundo\Content\Com\Container\ContentTypeFormContainer;
use Nemundo\Content\Com\Container\ContentTypeSubmenuAddContainer;
use Nemundo\Content\Com\Dropdown\ContentTypeCollectionSubmenuDropdown;
use Nemundo\Content\Index\Tree\Com\Container\SortableContentContainer;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Parameter\DataIdParameter;
use Nemundo\Content\View\AbstractContentAdmin;
use Nemundo\Core\Http\Url\UrlRedirect;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\BootstrapDropdown\Submenu;
use Nemundo\Web\Action\ActionSite;
use Nemundo\Web\Action\Site\DeleteActionSite;
use Nemundo\Web\Action\Site\EditActionSite;

class AbstractTreeContentAdmin extends AbstractContentAdmin
{

    /**
     * @var ActionSite
     */
    protected $child;

    /**
     * @var ActionSite
     */
    protected $childNew;
    // childAdd

    /**
     * @var ActionSite
     */
    //protected $childEdit;
    // child

    /**
     * @var ActionSite
     */
    protected $childContentEdit;

    /**
     * @var ActionSite
     */
    protected $childContentDelete;

    protected function loadActionSite()
    {

        parent::loadActionSite();

        $this->child = new EditActionSite($this);
        $this->child->title[LanguageCode::EN] = 'Child Edit';
        $this->child->title[LanguageCode::DE] = 'Child Bearbeiten';
        $this->child->actionName = 'child-edit';
        $this->child->onAction = function () {
            $dataId = (new DataIdParameter())->getValue();
            $this->loadChildEdit($dataId);
        };


        $this->childNew = new EditActionSite($this);
        $this->childNew->title[LanguageCode::EN] = 'Child New';
        $this->childNew->title[LanguageCode::DE] = 'Child New';
        $this->childNew->actionName = 'child-new';
        $this->childNew->onAction = function () {

            $contentTypeParameter = new ContentTypeParameter();
            if ($contentTypeParameter->exists()) {

                $dataId=(new DataIdParameter())->getValue();

                $contentType = clone($this->contentType);
                $contentType->fromDataId($dataId);

                $title = new AdminTitle($this);
                $title->content=$contentType->getSubject();

                $contentTypeNew =$contentTypeParameter->getContentType();
                $contentTypeNew->parentId =$contentType->getContentId();

                $widget = new AdminWidget($this);
                $widget->widgetTitle = $contentTypeNew->typeLabel;

                $container = new ContentTypeFormContainer($widget);
                $container->contentType = $contentTypeNew;
                $container->redirectSite =$this->getChildViewSite($dataId);

            }

        };





        $this->childContentEdit = new EditActionSite($this);
        $this->childContentEdit->title[LanguageCode::EN] = 'Child Content Edit';
        $this->childContentEdit->title[LanguageCode::DE] = 'Child Content Bearbeiten';
        $this->childContentEdit->actionName = 'child-content-edit';
        $this->childContentEdit->onAction = function () {

            $content=(new ContentParameter())->getContentType(false);

            $form=$content->getDefaultForm($this);
            $form->redirectSite= clone($this->child);

        };


        $this->childContentDelete = new DeleteActionSite($this);
        $this->childContentDelete->title[LanguageCode::EN] = 'Child Content Delete';
        $this->childContentDelete->title[LanguageCode::DE] = 'Child Content Edit';
        $this->childContentDelete->actionName = 'child-content-delete';
        $this->childContentDelete->onAction = function () {

            $content=(new ContentParameter())->getContentType(false);
            $content->removeFromParent();

            (new UrlReferer())->redirect();

        };

    }


    protected function getChildViewSite($dataId)
    {

        $site = clone($this->child);
        $site->addParameter(new DataIdParameter($dataId));
        return $site;

    }


    protected function loadChildEdit()  //$dataId)
    {

        $dataId=(new DataIdParameter())->getValue();

        $contentType = clone($this->contentType);
        $contentType->fromDataId($dataId);


        $title = new AdminTitle($this);
        $title->content=$contentType->getSubject();



        if ($this->contentType->allowChild) {

            if ($this->contentType->restrictedChild) {

                $dropdown = new ContentTypeCollectionSubmenuDropdown($this);
                $dropdown->redirectSite = clone($this->childNew);  // clone(ContentNewSite::$site);   // clone(ItemNewSite::$site);
                $dropdown->redirectSite->addParameter(new ContentParameter($this->contentType->getContentId()));

                /*foreach ($this->contentType->getRestrictedChildContentType() as $child) {
                    $dropdown->addContentType($child);
                }*/

                foreach ($this->contentType->getRestrictedContentTypeCollectionList() as $child) {
                    //$dropdown->addContentType($child);


                    $submenu=new Submenu($dropdown);
                    $submenu->label =$child->label;
                    foreach ($child->getContentTypeList() as $contentType) {

                        $site =  clone($this->childNew);
                        $site->addParameter(new ContentTypeParameter($contentType->typeId));
                        $site->title = $contentType->typeLabel;
                        $submenu->addSite($site);

                    }




                }




                /*
                foreach ($this->contentType->getRestrictedContentTypeCollectionList() as $collection) {
                    $dropdown->addContentTypeCollection($collection);
                }*/



            } else {

                $container = new ContentTypeSubmenuAddContainer($this);
                $container->parentId = $this->contentType->getContentId();
                $container->redirectSite =  clone($this->childNew);  // clone(ItemNewSite::$site);
                $container->redirectSite->addParameter(new ContentParameter());

            }

        }

        $container = new SortableContentContainer($this);
        $container->contentType = $contentType;
        $container->showViewIcon=false;
        $container->editRedirect=$this->childContentEdit;
        $container->deleteRedirect=$this->childContentDelete;

    }


}