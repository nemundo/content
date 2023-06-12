<?php

namespace Nemundo\ContentTest\App\Poi\Content\PoiWorkflow;

use Nemundo\Content\Index\Workflow\Type\Process\AbstractProcessItem;
use Nemundo\Content\Type\AbstractContentItem;
use Nemundo\ContentTest\App\Poi\Data\Poi\PoiReader;
use Nemundo\ContentTest\App\Poi\Data\Poi\PoiRow;

class PoiWorkflowItem extends AbstractProcessItem
{
    protected function loadItem()
    {
        $this->contentType = new PoiProcess();
    }


    protected function onDataRow()
    {
        $this->dataRow = (new PoiReader())->getRowById($this->dataId);
    }

    /**
     * @return \Nemundo\Model\Row\AbstractModelDataRow|PoiRow
     */
    public function getDataRow()
    {
        return parent::getDataRow();
    }


    public function getSubject()
    {
        return $this->getDataRow()->poi;
    }



}