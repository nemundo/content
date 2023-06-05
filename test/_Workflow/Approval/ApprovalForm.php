<?php

namespace Nemundo\ContentTest\Workflow\Approval;

use Nemundo\Admin\Com\ListBox\AdminLargeTextBox;
use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Core\Debug\Debug;

class _ApprovalForm extends AbstractContentForm
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

        (new Debug())->write($this->getActionList());

        $builder = new ApprovalBuilder($this->dataId);
        $builder->kommentar = $this->comment->getValue();
        $builder->addActionList($this->getActionList());
        $builder->buildContent();

        exit;


    }


}