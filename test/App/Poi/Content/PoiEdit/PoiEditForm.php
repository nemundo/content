<?php

namespace Nemundo\ContentTest\App\Poi\Content\PoiEdit;

use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\Content\Index\Workflow\Type\Status\AbstractWorkflowStatusForm;
use Nemundo\ContentTest\App\Poi\Content\PoiNew\PoiNewBuilder;

class PoiEditForm extends AbstractWorkflowStatusForm  // AbstractContentForm
{

    /**
     * @var AdminTextBox
     */
    private $poi;

    public function getContent()
    {

        $this->poi = new AdminTextBox($this);
        $this->poi->label = 'Poi';


        $id = new AdminTextBox($this);
        $id->value = 'workflow id: '.$this->workflowId;




        return parent::getContent();

    }






    protected function onSave()
    {

        $builder = new PoiEditBuilder();
        $builder->workflowId= $this->workflowId;
        $builder->poi = $this->poi->getValue();
        $builder->buildContent();

    }

}