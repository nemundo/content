<?php
namespace Nemundo\Content\Index\Workflow\Data\Workflow;
class WorkflowBulk extends \Nemundo\Model\Data\AbstractModelDataBulk {
/**
* @var WorkflowModel
*/
protected $model;

/**
* @var string
*/
public $processId;

/**
* @var string
*/
public $contentId;

/**
* @var string
*/
public $statusId;

public function __construct() {
parent::__construct();
$this->model = new WorkflowModel();
}
public function save() {
$this->typeValueList->setModelValue($this->model->processId, $this->processId);
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
$this->typeValueList->setModelValue($this->model->statusId, $this->statusId);
$id = parent::save();
return $id;
}
}