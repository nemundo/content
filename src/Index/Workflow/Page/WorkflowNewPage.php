<?php

namespace Nemundo\Content\Index\Workflow\Page;

use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Com\Input\ContentTypeHiddenInput;
use Nemundo\Content\Index\Workflow\Com\ListBox\ProcessListBox;
use Nemundo\Content\Index\Workflow\Com\Tab\WorkflowTab;
use Nemundo\Content\Index\Workflow\Site\WorkflowSite;
use Nemundo\Content\Index\Workflow\Type\Process\AbstractProcess;
use Nemundo\Content\Parameter\ContentTypeParameter;

class WorkflowNewPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new WorkflowTab($layout);


        $search = new AdminSearchForm($layout);

        $process = new ProcessListBox($search);
        $process->searchMode = true;
        $process->submitOnChange = true;


        if ($process->hasValue()) {


            /** @var AbstractProcess $contentType */
            $contentType = (new ContentTypeParameter())->getContentType();

            //$form = (new TestWorkflow())->getDefaultForm($this);
            $form = $contentType->getStartStatusType()->getDefaultForm($layout);  // getDefaultForm($this);
            $form->redirectSite = WorkflowSite::$site;

            $hidden = new ContentTypeHiddenInput($form);


        }

        return parent::getContent();
    }
}