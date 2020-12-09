<?php


namespace Nemundo\Content\Com\Form;


use Nemundo\Content\Com\ListBox\ContentViewListBox;
use Nemundo\Content\Data\Tree\TreeReader;
use Nemundo\Content\Data\Tree\TreeUpdate;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;

class ContentViewChangeForm extends BootstrapForm
{

    /**
     * @var AbstractTreeContentType
     */
    public $contentType;

    /**
     * @var ContentViewListBox
     */
    private $view;

    public function getContent()
    {

        //new ContentHiddenInput($this);
        //(new Debug())->write($this->contentType);

        $formRow=new BootstrapFormRow($this);

        $this->view = new ContentViewListBox($formRow);
        $this->view->contentType = $this->contentType;
        $this->view->value = $this->contentType->getDefaultTreeViewId();
        $this->view->submitOnChange = true;

        $reader = new TreeReader();
        $reader->model->loadView();
        $reader->filter->andEqual($reader->model->childId, $this->contentType->getContentId());
        foreach ($reader->getData() as $treeRow) {
            $this->view->value = $treeRow->viewId;
        }

        $this->submitButton->visible=false;


        return parent::getContent();

    }


    protected function onSubmit()
    {

        $update = new TreeUpdate();
        $update->viewId = $this->view->getValue();
        $update->filter->andEqual($update->model->childId, $this->contentType->getContentId());
        $update->update();
        //$update->updateById($this->contentType->getContentId());


    }

}