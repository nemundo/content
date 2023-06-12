<?php
namespace Nemundo\Content\Index\Workflow\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Content\Index\Workflow\Page\MyWorkflowPage;
class MyWorkflowSite extends AbstractSite {
protected function loadSite() {
$this->title = 'MyWorkflow';
$this->url = 'MyWorkflow';
}
public function loadContent() {
(new MyWorkflowPage())->render();
}
}