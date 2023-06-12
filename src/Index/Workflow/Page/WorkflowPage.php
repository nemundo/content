<?php

namespace Nemundo\Content\Index\Workflow\Page;

use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\ListBox\AdminSearchTextBox;
use Nemundo\Admin\Com\Pagination\AdminPagination;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Parameter\PageParameter;
use Nemundo\Admin\Usergroup\Parameter\UsergroupParameter;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Index\Workflow\Com\ListBox\ProcessListBox;
use Nemundo\Content\Index\Workflow\Com\Tab\WorkflowTab;
use Nemundo\Content\Index\Workflow\Data\Workflow\WorkflowPaginationReader;
use Nemundo\Content\Index\Workflow\Data\WorkflowLog\WorkflowLogReader;
use Nemundo\Content\Index\Workflow\Parameter\WorkflowParameter;
use Nemundo\Content\Index\Workflow\Site\WorkflowItemSite;
use Nemundo\Content\Index\Workflow\Site\WorkflowNewSite;
use Nemundo\Content\Index\Workflow\Site\WorkflowUsergroupSite;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Core\Text\BoldText;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Paragraph\Paragraph;

class WorkflowPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new WorkflowTab($layout);


        $parameter = new ContentTypeParameter();

        if ($parameter->hasValue()) {
            $btn = new AdminSiteButton($layout);
            $btn->site = clone(WorkflowNewSite::$site);
            $btn->site->addParameter(new ContentTypeParameter());
        }


        $search = new AdminSearchForm($layout);

        $subject = new AdminSearchTextBox($search);
        $subject->label='Subject';
        $subject->searchMode=true;


        $process = new ProcessListBox($search);
        $process->searchMode = true;
        $process->submitOnChange = true;

        $p = new Paragraph($layout);


        $table = new AdminTable($layout);

        $workflowReader = new WorkflowPaginationReader();
        //$workflowReader->model->loadProcess();
        //$workflowReader->model->process->loadContentType();
        $workflowReader->model->loadContent();
        $workflowReader->model->content->loadContentType();
        $workflowReader->model->loadStatus();
        $workflowReader->model->loadUsergroupAssignment();

        $workflowReader->currentPage = (new PageParameter())->getValue();

        if ($process->hasValue()) {
            //$workflowReader->filter->andEqual($workflowReader->model->processId,$process->getValue());
            $workflowReader->filter->andEqual($workflowReader->model->content->contentTypeId,$process->getValue());
        }

        if ($subject->hasValue()) {
            $workflowReader->filter->andContains($workflowReader->model->content->subject,$subject->getValue());
        }

        $workflowReader->addOrder($workflowReader->model->id,SortOrder::DESCENDING);


        $p->content = $workflowReader->getFormatTotalCount().' Workflow found';


        $bold = new BoldText();
        $bold->addKeyword($subject->getValue());


        $header = new AdminTableHeader($table);
        $header->addText('Process');
        //$header->addText($workflowReader->model->id->label);
        //$header->addText($workflowReader->model->content->label);
        //$header->addText($workflowReader->model->process->label);
        $header->addText($workflowReader->model->content->subject->label);
        $header->addText($workflowReader->model->status->label);

        $header->addText($workflowReader->model->usergroupAssignment->label);

        $header->addText($workflowReader->model->dateTimeCreated->label);

        foreach ($workflowReader->getData() as $workflowRow) {

            $row = new AdminTableRow($table);
            //$row->addText($workflowRow->id);
            //$row->addText($workflowRow->contentId);
            $row->addText($workflowRow->content->contentType->contentType);
            //$row->addText($workflowRow->content->subject);

            $site = clone(WorkflowItemSite::$site);
            $site->addParameter(new WorkflowParameter($workflowRow->id));
            $site->title = $bold->getBoldText( $workflowRow->content->subject);
            $row->addSite($site);

            $row->addText($workflowRow->status->contentType);
            //$row->addText($workflowRow->process->contentType->contentType);

            if ($workflowRow->hasUsergroupAssignment) {

                //$row->addText($workflowRow->usergroupAssignment->usergroup);

                $site = clone(WorkflowUsergroupSite::$site);
                $site->addParameter(new UsergroupParameter($workflowRow->usergroupAssignmentId));
                $site->title = $workflowRow->usergroupAssignment->usergroup;
                $row->addSite($site);

            } else {
                $row->addEmpty();
            }


            $row->addText($workflowRow->dateTimeCreated->getShortDateTimeLeadingZeroFormat());

        }

        $pagination = new AdminPagination($layout);
        $pagination->paginationReader = $workflowReader;


        return parent::getContent();

    }
}