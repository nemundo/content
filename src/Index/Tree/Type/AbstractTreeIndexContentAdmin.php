<?php

namespace Nemundo\Content\Index\Tree\Type;

use Nemundo\Admin\ActionSite\IconActionSite;
use Nemundo\Content\Com\Dropdown\ContentTypeDropdown;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Index\Tree\Action\TreeContentAction;
use Nemundo\Content\Index\Tree\Com\Table\ChildTreeTable;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Parameter\DataIdParameter;
use Nemundo\Content\View\AbstractContentAdmin;

abstract class AbstractTreeIndexContentAdmin extends AbstractContentAdmin
{

    /**
     * @var IconActionSite
     */
    private $treeContentEditor;

    protected function loadActionSite()
    {

        parent::loadActionSite();

        $this->treeContentEditor = new IconActionSite($this);
        $this->treeContentEditor->actionName = 'content-editor';
        $this->treeContentEditor->title = 'Content Editor';
        $this->treeContentEditor->iconName = 'info';
        $this->treeContentEditor->onAction = function () {
            $this->onContentEdit();
        };

    }


    protected function onContentEdit()
    {

        $dataId = (new DataIdParameter())->getValue();
        $contentId = $this->contentType->getItem($dataId)->getContentId();


        /*$item = new EventItem($dataId);
        $contentId = $item->getContentId();*/

        $action = new TreeContentAction();
        $action->parentId = $contentId;

        //$form = (new ImageType())->getDefaultForm($this);
        //$form->addAction($action);


        $dropdown = new ContentTypeDropdown($this);

        $reader = new ContentTypeReader();
        foreach ($reader->getData() as $contentTypeCustomRow) {
            $dropdown->addContentType($contentTypeCustomRow->getContentType());
        }


        /*$dropdown->addContentType(new YouTubeType());
        $dropdown->addContentType(new LargeTextType());
        $dropdown->addContentType(new ImageType());*/


        $parameter = new ContentTypeParameter();
        if ($parameter->hasValue()) {

            //$container = new ContentTypeFormContainer($this);
            //$container->contentType = $parameter->getContentType();
            //$form = (new ImageType())->getDefaultForm($this);

            $form = $parameter->getContentType()->getDefaultForm($this);
            $form->addAction($action);

        }


        $table = new ChildTreeTable($this);
        $table->contentId = $contentId;


    }


    protected function getTreeContentSite($dataId)
    {

        $site = clone($this->treeContentEditor);
        $site->addParameter(new DataIdParameter($dataId));
        return $site;

    }


}