<?php

namespace Nemundo\ContentTest\App\Poi\Content\Approval;

use Nemundo\Content\Type\AbstractContentItem;
use Nemundo\ContentTest\App\Poi\Data\Approval\ApprovalReader;
use Nemundo\ContentTest\App\Poi\Data\Approval\ApprovalRow;

class ApprovalItem extends AbstractContentItem
{
    protected function loadItem()
    {
        $this->contentType = new ApprovalType();
    }

    protected function onDataRow()
    {
        $this->dataRow = (new ApprovalReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|ApprovalRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return 'Kommentar';  // $this->getDataRow()->poi;
    }

}