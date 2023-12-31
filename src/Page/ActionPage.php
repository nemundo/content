<?php

namespace Nemundo\Content\Page;

use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Com\Tab\ContentTab;
use Nemundo\Content\Data\ContentAction\ContentActionReader;

class ActionPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new ContentTab($layout);

        $table = new AdminTable($layout);

        $reader = new ContentActionReader();

        (new AdminTableHeader($table))
            ->addText($reader->model->action->label);

        foreach ($reader->getData() as $actionRow) {

            (new AdminTableRow($table))
                ->addText($actionRow->action);


        }





        return parent::getContent();
    }
}