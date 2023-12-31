<?php

namespace Nemundo\Content\Index\Log\Page;

use Nemundo\Admin\Com\Form\AdminSearchForm;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Index\Log\Com\Tab\LogTab;
use Nemundo\Content\Index\Log\Data\ContentLog\ContentLogReader;
use Nemundo\Content\Index\Log\Status\DeleteStatus;

class TrashPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new LogTab($layout);

        $search = new AdminSearchForm($layout);

        $contentType = new ContentTypeListBox($search);
        $contentType->searchMode = true;
        $contentType->submitOnChange = true;

        $table = new AdminTable($layout);

        $reader = new ContentLogReader();
        $reader->model->loadContent();
        $reader->filter->andEqual($reader->model->statusId, (new DeleteStatus())->id);

        (new AdminTableHeader($table))
            ->addText($reader->model->content->subject->label)
            ->addText($reader->model->dateTimeCreated->label);

        foreach ($reader->getData() as $contentLogRow) {

            (new AdminTableRow($table))
                ->addText($contentLogRow->content->subject)
                ->addText($contentLogRow->dateTimeCreated->getShortDateTimeLeadingZeroFormat());


        }


        return parent::getContent();
    }
}