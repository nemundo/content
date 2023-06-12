<?php

namespace Nemundo\ContentTest\App\Gastro\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Index\Workflow\Com\Container\WorkflowFormContainer;
use Nemundo\Content\Index\Workflow\Com\Table\WorkflowLogTable;
use Nemundo\ContentTest\App\Gastro\Content\GastroWorkflow\GastroWorkflowType;
use Nemundo\ContentTest\App\Gastro\Parameter\GastroParameter;

class GastroItemPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $gastroId = (new GastroParameter())->getValue();


        $form = new WorkflowFormContainer($this);
        $form->process = new GastroWorkflowType();
        $form->dataId=$gastroId;



        $table = new WorkflowLogTable($this);
        $table->process = new GastroWorkflowType();
        $table->dataId=$gastroId;


        return parent::getContent();
    }
}