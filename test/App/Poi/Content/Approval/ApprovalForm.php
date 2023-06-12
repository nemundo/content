<?php

namespace Nemundo\ContentTest\App\Poi\Content\Approval;

use Nemundo\Admin\Com\ListBox\AdminLargeTextBox;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Content\Index\Workflow\Type\Status\AbstractWorkflowStatusForm;


class ApprovalForm extends AbstractWorkflowStatusForm
{

    /**
     * @var AdminLargeTextBox
     */
    private $comment;

    public function getContent()
    {

        $this->comment = new AdminLargeTextBox($this);
        $this->comment->label = 'Kommentar';

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        /*$poiRow = (new ApprovalItem($this->dataId))->getDataRow();
        $this->comment->value = $poiRow->poi;*/


    }


    protected function onSave()
    {

        $builder = new ApprovalBuilder($this->dataId);
        $builder->workflowId=$this->workflowId;
        $builder->kommentar = $this->comment->getValue();
        $builder->addActionList($this->getActionList());
        $builder->buildContent();



    }


}