<?phpnamespace Nemundo\Content\Row;use Nemundo\Content\Action\AbstractContentAction;use Nemundo\Content\Data\ContentAction\ContentActionReader;use Nemundo\Content\Data\ContentAction\ContentActionRow;class ActionCustomRow extends ContentActionRow{    public function getAction()    {        $actionRow = (new ContentActionReader())->getRowById($this->id);        $action = null;        if (class_exists($actionRow->phpClass)) {            /** @var AbstractContentAction $action */            $action = new $actionRow->phpClass();        }        return $action;    }}