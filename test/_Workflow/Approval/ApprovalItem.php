<?php

namespace Nemundo\ContentTest\Workflow\Approval;

use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;
use Nemundo\Content\Type\AbstractContentItem;
use Nemundo\ContentTest\App\Poi\Data\Approval\ApprovalReader;
use Nemundo\ContentTest\App\Poi\Data\Approval\ApprovalRow;
use Nemundo\ContentTest\App\Poi\Data\Poi\PoiReader;
use Nemundo\ContentTest\App\Poi\Data\Poi\PoiRow;


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