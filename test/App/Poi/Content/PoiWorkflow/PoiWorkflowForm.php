<?php

namespace Nemundo\ContentTest\App\Poi\Content\PoiWorkflow;

use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Content\Index\Workflow\Action\WorkflowAction;

class PoiWorkflowForm extends AbstractContentForm
{

    /**
     * @var AdminTextBox
     */
    private $poi;

    public function getContent()
    {

        $this->poi = new AdminTextBox($this);
        $this->poi->label = 'Test Title';

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        /*$poiRow = (new PoiItem($this->dataId))->getDataRow();
        $this->poi->value = $poiRow->poi;*/

    }


    protected function onSave()
    {

        $builder = new PoiWorkflowBuilder($this->dataId);
        $builder->poi = $this->poi->getValue();
        $builder->buildContent();

        $item = new PoiWorkflowItem($builder->getDataId());
        (new WorkflowAction())->onAction($item);

    }


}