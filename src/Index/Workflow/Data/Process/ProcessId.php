<?php
namespace Nemundo\Content\Index\Workflow\Data\Process;
use Nemundo\Model\Id\AbstractModelIdValue;
class ProcessId extends AbstractModelIdValue {
/**
* @var ProcessModel
*/
public $model;

public function __construct() {
parent::__construct();
$this->model = new ProcessModel();
}
}