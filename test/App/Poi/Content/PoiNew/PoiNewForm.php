<?php

namespace Nemundo\ContentTest\App\Poi\Content\PoiNew;

use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Content\Index\Workflow\Action\WorkflowAction;
use Nemundo\ContentTest\App\Poi\Content\PoiWorkflow\PoiWorkflowBuilder;
use Nemundo\ContentTest\App\Poi\Content\PoiWorkflow\PoiWorkflowItem;

class PoiNewForm extends AbstractContentForm
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


    protected function onSave()
    {

        $builder = new PoiWorkflowBuilder($this->dataId);
        $builder->poi = $this->poi->getValue();
        $builder->buildContent();

        $item = new PoiWorkflowItem($builder->getDataId());
        (new WorkflowAction())->onAction($item);





    }
}