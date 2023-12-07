<?php

namespace Nemundo\ContentTest\App\Poi\Page;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\ContentTest\App\Poi\Content\PoiNew\PoiNewForm;
use Nemundo\ContentTest\App\Poi\Content\PoiWorkflow\PoiProcess;
use Nemundo\ContentTest\App\Poi\Content\TestPoi\TestPoiType;
use Nemundo\ContentTest\App\Poi\Data\Poi\PoiReader;

class PoiPage extends AbstractTemplateDocument
{
    public function getContent()
    {


        (new TestPoiType())->getAdmin($this);

        //(new PoiNewForm($this));

       // (new PoiProcess())->getStartStatusType()->getDefaultForm($this);


       /* $table = new AdminTable($this);

        $reader = new PoiReader();

        $header = new AdminTableHeader($table);
        $header->addText($reader->model->poi->label);


        foreach ($reader->getData() as $poiRow) {

            $row = new AdminTableRow($table);
            $row->addText($poiRow->poi);

        }*/

        return parent::getContent();

    }
}