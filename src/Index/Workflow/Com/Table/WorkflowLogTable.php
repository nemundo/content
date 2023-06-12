<?php

namespace Nemundo\Content\Index\Workflow\Com\Table;

use Nemundo\Admin\Com\Card\AdminCard;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Content\Index\Workflow\Data\WorkflowLog\WorkflowLogReader;
use Nemundo\Content\Index\Workflow\Type\Process\AbstractProcess;
use Nemundo\Html\Block\Div;

class WorkflowLogTable extends AdminTable
{

    /**
     * @var AbstractProcess
     */
    public $process;

    public $dataId;

    public function getContent()
    {

        $logReader = new WorkflowLogReader();
        $logReader->model->loadWorkflow();
        $logReader->model->workflow->loadContent();

        $logReader->model->loadContent();
        $logReader->model->content->loadContentType();
        //$logReader->filter->andEqual($logReader->model->workflowId,$workflowId);
        $logReader->filter->andEqual($logReader->model->workflow->content->contentTypeId, $this->process->typeId);
        $logReader->filter->andEqual($logReader->model->workflow->content->dataId, $this->dataId);

        $header = new AdminTableHeader($this);
        $header->addText($logReader->model->content->label);
        $header->addText($logReader->model->dateTime->label);


        foreach ($logReader->getData() as $logRow) {


            $row = new AdminTableRow($this);
            $row->addText($logRow->content->subject);
            $row->addText($logRow->dateTime->getShortDateTimeLeadingZeroFormat());


            /*$card = new AdminCard($div);
            $card->cardTitle = $logRow->content->subject;

            $view = $logRow->content->getContent()->getDefaultView($card);  // getItem($logRow->content->dataId)->get
            $view->dataId = $logRow->content->dataId;*/

        }

        return parent::getContent();

    }

}