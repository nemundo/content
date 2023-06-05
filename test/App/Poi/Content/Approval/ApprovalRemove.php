<?php
namespace Nemundo\ContentTest\App\Poi\Content\Approval;
use Nemundo\Content\Type\AbstractContentRemove;
class ApprovalRemove extends AbstractContentRemove {
protected function loadRemove() {
$this->contentType = new ApprovalType();
}
protected function onDelete() {
}
}