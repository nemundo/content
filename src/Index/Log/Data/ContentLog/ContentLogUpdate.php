<?php
namespace Nemundo\Content\Index\Log\Data\ContentLog;
use Nemundo\Model\Data\AbstractModelUpdate;
class ContentLogUpdate extends AbstractModelUpdate {
/**
* @var ContentLogModel
*/
public $model;

/**
* @var string
*/
public $statusId;

/**
* @var string
*/
public $userCreatedId;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTimeCreated;

/**
* @var string
*/
public $userLastChangeId;

/**
* @var \Nemundo\Core\Type\DateTime\DateTime
*/
public $dateTimeLastChange;

/**
* @var string
*/
public $contentId;

public function __construct() {
parent::__construct();
$this->model = new ContentLogModel();
$this->dateTimeCreated = new \Nemundo\Core\Type\DateTime\DateTime();
$this->dateTimeLastChange = new \Nemundo\Core\Type\DateTime\DateTime();
}
public function update() {
$this->typeValueList->setModelValue($this->model->statusId, $this->statusId);
$this->typeValueList->setModelValue($this->model->userCreatedId, $this->userCreatedId);
if ($this-> dateTimeCreated->hasValue()) {
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTimeCreated, $this->typeValueList);
$property->setValue($this->dateTimeCreated);
}
$this->typeValueList->setModelValue($this->model->userLastChangeId, $this->userLastChangeId);
if ($this-> dateTimeLastChange->hasValue()) {
$property = new \Nemundo\Model\Data\Property\DateTime\DateTimeDataProperty($this->model->dateTimeLastChange, $this->typeValueList);
$property->setValue($this->dateTimeLastChange);
}
$this->typeValueList->setModelValue($this->model->contentId, $this->contentId);
parent::update();
}
}