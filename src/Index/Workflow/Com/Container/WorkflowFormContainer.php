<?php

namespace Nemundo\Content\Index\Workflow\Com\Container;

use Nemundo\Admin\Com\Card\AdminCard;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Html\Listing\UnorderedList;
use Nemundo\Content\Index\Workflow\Data\Workflow\WorkflowReader;
use Nemundo\Content\Index\Workflow\Type\Process\AbstractProcess;
use Nemundo\Content\Index\Workflow\Type\Status\AbstractWorkflowStatusForm;
use Nemundo\Content\Index\Workflow\Type\Status\AbstractWorkflowStatusType;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Paragraph\Paragraph;

class WorkflowFormContainer extends Div
{

    /**
     * @var AbstractProcess
     */
    public $process;

    public $dataId;

    public function getContent()
    {

        $workflowReader = new WorkflowReader();
        $workflowReader->model->loadContent();
        $workflowReader->model->content->loadContentType();
        $workflowReader->model->loadStatus();
        //$workflowReader->model->status->loadStatus();
        $workflowReader->filter->andEqual($workflowReader->model->content->contentTypeId, $this->process->typeId);
        $workflowReader->filter->andEqual($workflowReader->model->content->dataId, $this->dataId);

        foreach ($workflowReader->getData() as $workflowRow) {

            $title = new AdminTitle($this);
            $title->content = $workflowRow->content->subject; // $workflowId;


            $card = new AdminCard($this);
            $card->cardTitle = $workflowRow->content->subject;

            $workflowRow->content->getContent()->getDefaultView($this);

            $p = new Paragraph($this);
            $p->content = $workflowRow->content->subject;

            $p = new Paragraph($this);
            $p->content = 'Status: ' . $workflowRow->status->contentType;  // getContentType()->ty  content->subject;


            /*$action = new WorkflowLogAction();
            $action->workflowId = $workflowId;

            $form = (new ApprovalType())->getDefaultForm($layout);
            $form->addAction($action);*/

            /** @var AbstractWorkflowStatusType $contentType */
            $contentType = $workflowRow->status->getContentType();  // getContent();

            //(new Debug())->write($contentType);


            $ul = new UnorderedList($this);

            foreach ($contentType->getNextWorkflowStatusList() as $nextWorkflowStatus) {

                $ul->addText($nextWorkflowStatus->typeLabel);

                $card = new AdminCard($this);
                $card->cardTitle = $nextWorkflowStatus->typeLabel;

                /** @var AbstractWorkflowStatusForm $form */
                $form = $nextWorkflowStatus->getDefaultForm($card);
                $form->workflowId = $workflowRow->id;


            }

        }

        return parent::getContent();

    }

}