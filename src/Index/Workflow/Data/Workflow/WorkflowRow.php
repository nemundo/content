<?php
namespace Nemundo\Content\Index\Workflow\Data\Workflow;
class WorkflowRow extends \Nemundo\Model\Row\AbstractModelDataRow {
/**
* @var \Nemundo\Model\Row\AbstractModelDataRow
*/
private $row;

/**
* @var WorkflowModel
*/
public $model;

/**
* @var string
*/
public $id;

/**
* @var string
*/
public $processId;

/**
* @var \Nemundo\Content\Index\Workflow\Data\Process\ProcessRow
*/
public $process;

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
public $dateTimeCreated;

/**
* @var string
*/
public $statusId;

/**
* @var \Nemundo\Content\Row\ContentTypeCustomRow
*/
public $status;

public function __construct(\Nemundo\Db\Row\AbstractDataRow $row, $model) {
parent::__construct($row->getData());
$this->row = $row;
$this->id = $this->getModelValue($model->id);
$this->processId = $this->getModelValue($model->processId);
if ($model->process !== null) {
$this->loadNemundoContentIndexWorkflowDataProcessProcessprocessRow($model->process);
}
$this->contentId = intval($this->getModelValue($model->contentId));
if ($model->content !== null) {
$this->loadNemundoContentDataContentContentcontentRow($model->content);
}
$this->dateTimeCreated = new \Nemundo\Core\Type\DateTime\DateTime($this->getModelValue($model->dateTimeCreated));
$this->statusId = $this->getModelValue($model->statusId);
if ($model->status !== null) {
$this->loadNemundoContentDataContentTypeContentTypestatusRow($model->status);
}
}
private function loadNemundoContentIndexWorkflowDataProcessProcessprocessRow($model) {
$this->process = new \Nemundo\Content\Index\Workflow\Data\Process\ProcessRow($this->row, $model);
}
private function loadNemundoContentDataContentContentcontentRow($model) {
$this->content = new \Nemundo\Content\Row\ContentCustomRow($this->row, $model);
}
private function loadNemundoContentDataContentTypeContentTypestatusRow($model) {
$this->status = new \Nemundo\Content\Row\ContentTypeCustomRow($this->row, $model);
}
}