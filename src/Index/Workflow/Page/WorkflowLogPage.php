<?php

namespace Nemundo\Content\Index\Workflow\Page;

use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Pagination\AdminPagination;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Admin\Parameter\PageParameter;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Index\Workflow\Com\Tab\WorkflowTab;
use Nemundo\Content\Index\Workflow\Data\WorkflowLog\WorkflowLogPaginationReader;
use Nemundo\Db\Sql\Order\SortOrder;

class WorkflowLogPage extends AbstractTemplateDocument
{
    public function getContent()
    {


        $layout = new AdminFlexboxLayout($this);
        new WorkflowTab($layout);


        $subtitle = new AdminSubtitle($layout);
        $subtitle->content = 'Workflow Log';

        $table = new AdminTable($layout);


        $workflowLogReader = new WorkflowLogPaginationReader();
        $workflowLogReader->model->loadUser();
        $workflowLogReader->model->loadContent();
        $workflowLogReader->model->content->loadContentType();
        $workflowLogReader->model->loadWorkflow();
        $workflowLogReader->model->workflow->loadContent();
        $workflowLogReader->model->workflow->content->loadContentType();

        $workflowLogReader->addOrder($workflowLogReader->model->id, SortOrder::DESCENDING);

        $workflowLogReader->currentPage = (new PageParameter())->getValue();

        $header = new AdminTableHeader($table);
        $header->addText($workflowLogReader->model->dateTime->label);
        $header->addText($workflowLogReader->model->user->label);
        $header->addText($workflowLogReader->model->id->label);
        $header->addText($workflowLogReader->model->content->label);
        $header->addText($workflowLogReader->model->content->label);


        foreach ($workflowLogReader->getData() as $workflowLogRow) {

            $row = new AdminTableRow($table);
            $row->addText($workflowLogRow->dateTime->getShortDateTimeLeadingZeroFormat());
            $row->addText($workflowLogRow->user->displayName);
            $row->addText($workflowLogRow->workflowId);
            $row->addText($workflowLogRow->content->contentType->contentType);
            $row->addText($workflowLogRow->workflow->content->contentType->contentType);
            $row->addText($workflowLogRow->workflow->content->subject);

        }

        $pagination = new AdminPagination($layout);
        $pagination->paginationReader = $workflowLogReader;


        return parent::getContent();
    }
}