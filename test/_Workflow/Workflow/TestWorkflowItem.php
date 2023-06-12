<?php

namespace Nemundo\ContentTest\Workflow\Workflow;

use Nemundo\Content\Type\AbstractContentItem;
use Nemundo\ContentTest\App\Poi\Data\Poi\PoiReader;
use Nemundo\ContentTest\App\Poi\Data\Poi\PoiRow;
use Nemundo\ContentTest\Content\Poi\PoiType;

class TestWorkflowItem extends AbstractContentItem
{

    protected function loadItem()
    {
        $this->contentType = new TestProcess();
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