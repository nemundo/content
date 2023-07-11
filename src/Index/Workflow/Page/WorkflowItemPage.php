<?php

namespace Nemundo\Content\Index\Workflow\Page;

use Nemundo\Admin\Com\Card\AdminCard;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Index\Workflow\Action\WorkflowLogAction;
use Nemundo\Content\Index\Workflow\Com\Tab\WorkflowTab;
use Nemundo\Content\Index\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Content\Index\Workflow\Data\WorkflowLog\WorkflowLogReader;
use Nemundo\Content\Index\Workflow\Parameter\WorkflowParameter;
use Nemundo\Content\Index\Workflow\Type\Status\AbstractWorkflowStatusForm;
use Nemundo\Content\Index\Workflow\Type\Status\AbstractWorkflowStatusType;
use Nemundo\ContentTest\App\Poi\Content\Approval\ApprovalType;
use Nemundo\Core\Debug\Debug;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Paragraph\Paragraph;


class WorkflowItemPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new WorkflowTab($layout);



        $workflowId = (new WorkflowParameter())->getValue();

        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadContent();
        $workflowReader->model->content->loadContentType();
        $workflowReader->model->loadStatus();
        //$workflowReader->model->status->loadStatus();
        $workflowRow = $workflowReader->getRowById($workflowId);


        $title = new AdminTitle($layout);
        $title->content =$workflowRow->content->subject; // $workflowId;


        $card = new AdminCard($layout);
        $card->cardTitle = $workflowRow->content->subject;

        $workflowRow->content->getContent()->getDefaultView($layout);


        $p = new Paragraph($layout);
        $p->content = $workflowRow->content->subject;

        $p = new Paragraph($layout);
        $p->content = 'Status: '. $workflowRow->status->contentType;  // getContentType()->ty  content->subject;


        /*$action = new WorkflowLogAction();
        $action->workflowId = $workflowId;

        $form = (new ApprovalType())->getDefaultForm($layout);
        $form->addAction($action);*/

        /** @var AbstractWorkflowStatusType $contentType */
        $contentType = $workflowRow->status->getContentType();  // getContent();

        //(new Debug())->write($contentType);


        $ul = new UnorderedList($layout);

        foreach ($contentType->getNextWorkflowStatusList() as $nextWorkflowStatus) {

            $ul->addText($nextWorkflowStatus->typeLabel);

            $card = new AdminCard($layout);
            $card->cardTitle = $nextWorkflowStatus->typeLabel;

            /** @var AbstractWorkflowStatusForm $form */
            $form = $nextWorkflowStatus->getDefaultForm($card);
            $form->workflowId = $workflowId;


        }




        $table = new AdminTable($layout);

        $div = new Div($layout);

        $logReader = new WorkflowLogReader();
        $logReader->model->loadUser();
        $logReader->model->loadContent();
        $logReader->model->content->loadContentType();
        $logReader->filter->andEqual($logReader->model->workflowId,$workflowId);

        $header = new AdminTableHeader($table);
        $header->addText($logReader->model->content->label);
        $header->addText($logReader->model->dateTime->label);
        $header->addText($logReader->model->user->label);

        foreach ($logReader->getData() as $logRow) {


            $row = new AdminTableRow($table);
            $row->addText($logRow->content->subject);
            $row->addText($logRow->dateTime->getShortDateTimeLeadingZeroFormat());
            $row->addText($logRow->user->login);

            $card = new AdminCard($div);
            $card->cardTitle = $logRow->content->subject;

            $view = $logRow->content->getContent()->getDefaultView($card);  // getItem($logRow->content->dataId)->get
            $view->dataId = $logRow->content->dataId;

        }



        return parent::getContent();
    }
}