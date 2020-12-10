<?php


namespace Nemundo\Content\Index\Tree\Com\Form;


use Nemundo\Content\Com\ListBox\ContentViewListBox;
use Nemundo\Content\Index\Tree\Data\Tree\TreeReader;
use Nemundo\Content\Index\Tree\Data\Tree\TreeUpdate;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;

class ContentViewChangeForm extends BootstrapForm
{

    public $treeId;

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


        $treeRow = (new TreeReader())->getRowById($this->treeId);

        $this->view = new ContentViewListBox($formRow);
        $this->view->contentType = $this->contentType;
        $this->view->value =$treeRow->viewId;  // $this->contentType->getDefaultTreeViewId();
        $this->view->submitOnChange = true;

        /*$reader = new TreeReader();
        $reader->model->loadView();
        //$reader->filter->andEqual($reader->model->childId, $this->contentType->getContentId());
        $reader->filter->andEqual($reader->model->id,$this->treeId);
        foreach ($reader->getData() as $treeRow) {
            $this->view->value = $treeRow->viewId;
        }*/

        $this->view->value = $treeRow->viewId;

        $this->submitButton->visible=false;


        return parent::getContent();

    }


    protected function onSubmit()
    {

        $update = new TreeUpdate();
        $update->viewId = $this->view->getValue();
        $update->updateById($this->treeId);
        //$update->filter->andEqual($update->model->childId, $this->contentType->getContentId());
        //$update->update();
        //$update->updateById($this->contentType->getContentId());


    }

}