<?php
namespace Nemundo\Content\Index\Workflow\Data;
use Nemundo\Model\Collection\AbstractModelCollection;
class WorkflowModelCollection extends AbstractModelCollection {
protected function loadCollection() {
$this->addModel(new \Nemundo\Content\Index\Workflow\Data\Process\ProcessModel());
$this->addModel(new \Nemundo\Content\Index\Workflow\Data\Status\StatusModel());
$this->addModel(new \Nemundo\Content\Index\Workflow\Data\Workflow\WorkflowModel());
$this->addModel(new \Nemundo\Content\Index\Workflow\Data\WorkflowLog\WorkflowLogModel());
}
}