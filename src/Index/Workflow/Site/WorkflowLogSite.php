<?php
namespace Nemundo\Content\Index\Workflow\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Content\Index\Workflow\Page\WorkflowLogPage;
class WorkflowLogSite extends AbstractSite {
protected function loadSite() {
$this->title = 'WorkflowLog';
$this->url = 'WorkflowLog';
}
public function loadContent() {
(new WorkflowLogPage())->render();
}
}