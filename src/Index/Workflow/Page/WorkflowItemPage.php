<?php

namespace Nemundo\Content\Index\Workflow\Page;

use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Index\Workflow\Action\WorkflowLogAction;
use Nemundo\Content\Index\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Content\Index\Workflow\Data\WorkflowLog\WorkflowLogReader;
use Nemundo\Content\Index\Workflow\Parameter\WorkflowParameter;
use Nemundo\ContentTest\App\Poi\Content\Approval\ApprovalType;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Paragraph\Paragraph;


class WorkflowItemPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);


        $workflowId = (new WorkflowParameter())->getValue();

        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadContent();
        $workflowRow = $workflowReader->getRowById($workflowId);


        $title = new AdminTitle($layout);
        $title->content =$workflowRow->content->subject; // $workflowId;


        $p = new Paragraph($layout);
        $p->content = $workflowRow->content->subject;


        $action = new WorkflowLogAction();
        $action->workflowId = $workflowId;

        $form = (new ApprovalType())->getDefaultForm($layout);
        $form->addAction($action);


        $table = new AdminTable($layout);

        $div = new Div($layout);

        $logReader = new WorkflowLogReader();
        $logReader->model->loadContent();
        $logReader->model->content->loadContentType();
        $logReader->filter->andEqual($logReader->model->workflowId,$workflowId);

        $header = new AdminTableHeader($table);
        $header->addText($logReader->model->content->label);
        $header->addText($logReader->model->dateTime->label);


        foreach ($logReader->getData() as $logRow) {


            $row = new AdminTableRow($table);
            $row->addText($logRow->content->subject);
            $row->addText($logRow->dateTime->getShortDateTimeLeadingZeroFormat());


            $view = $logRow->content->getContent()->getDefaultView($div);  // getItem($logRow->content->dataId)->get
            $view->dataId = $logRow->content->dataId;

        }



        return parent::getContent();
    }
}