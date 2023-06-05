<?php
namespace Nemundo\Content\Index\Workflow\Data\WorkflowLog;
class WorkflowLogRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var WorkflowLogModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var int
*/
public $workflowId;

/**
* @var \Nemundo\Content\Index\Workflow\Data\Workflow\WorkflowRow
*/
public $workflow;

/**
* @var int
*/
public $contentId;

/**
* @var \Nemundo\Content\Row\ContentCustomRow
*/
public $content;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTime;

/**
* @var string
*/
public $userId;

/**
* @var \Nemundo\User\Data\User\UserRow
*/
public $user;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->workflowId = intval($this->getModelValue($model->workflowId));
if ($model->workflow !== null) {
$this->loadNemundoContentIndexWorkflowDataWorkflowWorkflowworkflowRow($model->workflow);
}
$this->contentId = intval($this->getModelValue($model->contentId));
if ($model->content !== null) {
$this->loadNemundoContentDataContentContentcontentRow($model->content);
}
$this->dateTime = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTime));
$this->userId = $this->getModelValue($model->userId);
if ($model->user !== null) {
$this->loadNemundoUserDataUserUseruserRow($model->user);
}
}
private function loadNemundoContentIndexWorkflowDataWorkflowWorkflowworkflowRow($model) {
$this->workflow = new \Nemundo\Content\Index\Workflow\Data\Workflow\WorkflowRow($this->row, $model);
}
private function loadNemundoContentDataContentContentcontentRow($model) {
$this->content = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
private function loadNemundoUserDataUserUseruserRow($model) {
$this->user = new \Nemundo\User\Data\User\UserRow($this->row, $model);
}
}