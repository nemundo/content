<?phpnamespace Nemundo\Content\Index\Log\Page;use Nemundo\Admin\Com\Form\AdminSearchForm;use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;use Nemundo\Admin\Com\Pagination\AdminPagination;use Nemundo\Admin\Com\Table\AdminTable;use Nemundo\Admin\Com\Table\AdminTableHeader;use Nemundo\Admin\Com\Table\Row\AdminTableRow;use Nemundo\Admin\Parameter\PageParameter;use Nemundo\Com\Template\AbstractTemplateDocument;use Nemundo\Content\Com\ListBox\ContentTypeListBox;use Nemundo\Content\Index\Log\Com\Tab\LogTab;use Nemundo\Content\Index\Log\Data\Log\LogPaginationReader;use Nemundo\Content\Index\Log\Reader\Log\LogDataPaginationReader;use Nemundo\Content\Index\Log\Type\AbstractLogContentType;use Nemundo\Db\Sql\Order\SortOrder;use Nemundo\Html\Paragraph\Paragraph;class LogPage extends AbstractTemplateDocument{    public function getContent()    {        $layout = new AdminFlexboxLayout($this);        new LogTab($layout);        $search = new AdminSearchForm($layout);        $contentType = new ContentTypeListBox($search);        $contentType->searchMode = true;        $contentType->submitOnChange = true;        $p = new Paragraph($layout);        $table = new AdminTable($layout);        $logReader = new LogDataPaginationReader();        /*$logReader->model->loadContent();        $logReader->model->content->loadContentType();        $logReader->model->loadUser();*/        if ($contentType->hasValue()) {            $logReader->contentTypeId = $contentType->getValue();        }        $logReader->currentPage = (new PageParameter())->getValue();        $logReader->addOrder($logReader->model->id, SortOrder::DESCENDING);        $p->content = $logReader->getFormatTotalCount().' items found';        $header = new AdminTableHeader($table);        $header->addText($logReader->model->content->contentType->label);        $header->addText($logReader->model->content->label);        $header->addText($logReader->model->user->label);        $header->addText($logReader->model->dateTime->label);        $header->addText($logReader->model->create->label);        $header->addText($logReader->model->statusChange->label);        $header->addText($logReader->model->status->label);        $header->addText($logReader->model->hasLogData->label);        //$header->addText($logReader->model->logDataId->label);        $header->addEmpty();        foreach ($logReader->getData() as $logRow) {            /** @var AbstractLogContentType $contentType */            $contentType = $logRow->content->contentType->getContentType();            $tableRow = new AdminTableRow($table);            $tableRow->addText($logRow->content->contentType->contentType);            $tableRow->addText($logRow->content->subject);            $tableRow->addText($logRow->user->displayName);            $tableRow->addText($logRow->dateTime->getShortDateTimeLeadingZeroFormat());            $tableRow->addYesNo($logRow->create);            $tableRow->addYesNo($logRow->statusChange);            $tableRow->addText($logRow->status->status);            $tableRow->addYesNo($logRow->hasLogData);            //$tableRow->addText($logRow->logDataId);            if ($logRow->hasLogData) {            if ($contentType->hasLogView()) {                $view = $contentType->getLogView($tableRow);                $view->logDataId = $logRow->logDataId;            } else {                $tableRow->addEmpty();            }            } else {                $tableRow->addEmpty();            }        }        $pagination = new AdminPagination($layout);        $pagination->paginationReader = $logReader;        return parent::getContent();    }}