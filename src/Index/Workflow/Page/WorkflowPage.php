<?php

namespace Nemundo\Content\Index\Workflow\Page;

use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Pagination\AdminPagination;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Parameter\PageParameter;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Index\Workflow\Com\ListBox\ProcessListBox;
use Nemundo\Content\Index\Workflow\Data\Workflow\WorkflowPaginationReader;
use Nemundo\Content\Index\Workflow\Parameter\WorkflowParameter;
use Nemundo\Content\Index\Workflow\Site\WorkflowItemSite;
use Nemundo\Content\Index\Workflow\Site\WorkflowNewSite;
use Nemundo\Content\Parameter\ContentTypeParameter;

class WorkflowPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);


        $parameter = new ContentTypeParameter();

        if ($parameter->hasValue()) {
            $btn = new AdminSiteButton($layout);
            $btn->site = clone(WorkflowNewSite::$site);
            $btn->site->addParameter(new ContentTypeParameter());
        }


        $search = new AdminSearchForm($layout);

        $process = new ProcessListBox($search);
        $process->searchMode = true;
        $process->submitOnChange = true;


        $table = new AdminTable($layout);

        $workflowReader = new WorkflowPaginationReader();
        $workflowReader->model->loadProcess();
        $workflowReader->model->process->loadContentType();
        $workflowReader->model->loadContent();
        $workflowReader->model->content->loadContentType();
        $workflowReader->model->loadStatus();

        $workflowReader->currentPage = (new PageParameter())->getValue();

        $header = new AdminTableHeader($table);
        $header->addText($workflowReader->model->id->label);
        $header->addText($workflowReader->model->process->label);
        $header->addText($workflowReader->model->status->label);
        $header->addText($workflowReader->model->dateTimeCreated->label);

        foreach ($workflowReader->getData() as $workflowRow) {

            $row = new AdminTableRow($table);
            $row->addText($workflowRow->id);

            $row->addText($workflowRow->contentId);

            $row->addText($workflowRow->content->contentType->contentType);
            $row->addText($workflowRow->content->subject);

            $row->addText($workflowRow->process->contentType->contentType);
            $row->addText($workflowRow->dateTimeCreated->getShortDateTimeLeadingZeroFormat());

            $site = clone(WorkflowItemSite::$site);
            $site->addParameter(new WorkflowParameter($workflowRow->id));
            $row->addSite($site);

        }

        $pagination = new AdminPagination($layout);
        $pagination->paginationReader = $workflowReader;

        return parent::getContent();

    }
}