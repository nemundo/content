<?php

namespace Nemundo\ContentTest\App\Gastro\Page;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\ContentTest\App\Gastro\Content\GastroWorkflow\GastroWorkflowType;
use Nemundo\ContentTest\App\Gastro\Data\Gastro\GastroReader;
use Nemundo\ContentTest\App\Gastro\Parameter\GastroParameter;
use Nemundo\ContentTest\App\Gastro\Site\GastroItemSite;
use Nemundo\ContentTest\App\Poi\Content\PoiWorkflow\PoiProcess;
use Nemundo\ContentTest\App\Poi\Data\Poi\PoiReader;

class GastroPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        (new GastroWorkflowType())->getStartStatusType()->getDefaultForm($this);


        $table = new AdminTable($this);

        $reader = new GastroReader();

        $header = new AdminTableHeader($table);
        $header->addText($reader->model->gastro->label);


        foreach ($reader->getData() as $gastroRow) {

            $row = new AdminTableRow($table);

            $row->addText($gastroRow->gastro);

            $site = clone(GastroItemSite::$site);
            $site->addParameter(new GastroParameter($gastroRow->id));
            $row->addSite($site);


        }


        return parent::getContent();
    }
}