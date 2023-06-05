<?php

namespace Nemundo\Content\Index\Workflow\Page;

use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Index\Workflow\Site\WorkflowSite;
use Nemundo\Content\Index\Workflow\Type\AbstractWorkflow;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\ContentTest\Workflow\Process\TestProcess;
use Nemundo\ContentTest\Workflow\Workflow\TestWorkflow;

class WorkflowNewPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);

        /** @var AbstractWorkflow $contentType */
        $contentType = (new ContentTypeParameter())->getContentType();

        //$form = (new TestWorkflow())->getDefaultForm($this);
        $form = $contentType->getStartStatusType()->getDefaultForm($layout);  // getDefaultForm($this);
        $form->redirectSite = WorkflowSite::$site;

        return parent::getContent();
    }
}