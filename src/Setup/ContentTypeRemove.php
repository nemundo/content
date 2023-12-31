<?phpnamespace Nemundo\Content\Setup;use Nemundo\App\Application\Setup\AbstractSetup;use Nemundo\Content\Data\Content\ContentCount;use Nemundo\Content\Data\Content\ContentDelete;use Nemundo\Content\Data\Content\ContentPaginationReader;use Nemundo\Content\Data\Content\ContentReader;use Nemundo\Content\Data\ContentAction\ContentActionReader;use Nemundo\Content\Data\ContentType\ContentType;use Nemundo\Content\Data\ContentType\ContentTypeCount;use Nemundo\Content\Data\ContentType\ContentTypeDelete;use Nemundo\Content\Data\ContentType\ContentTypeUpdate;use Nemundo\Content\Data\ContentView\ContentView;use Nemundo\Content\Data\ContentView\ContentViewCount;use Nemundo\Content\Data\ContentView\ContentViewDelete;use Nemundo\Content\Data\ContentView\ContentViewUpdate;use Nemundo\Content\Data\ViewContentType\ViewContentType;use Nemundo\Content\Data\ViewContentType\ViewContentTypeCount;use Nemundo\Content\Data\ViewContentType\ViewContentTypeDelete;use Nemundo\Content\Type\AbstractContentType;use Nemundo\Content\Type\AbstractType;use Nemundo\Content\Type\ViewTrait;use Nemundo\Core\Base\AbstractBase;use Nemundo\Core\Language\Translation;use Nemundo\Core\Log\LogMessage;class ContentTypeRemove extends AbstractBase{    public function removeContent(AbstractContentType $contentType)    {        $delete = new ContentDelete();        $delete->filter->andEqual($delete->model->contentTypeId, $contentType->typeId);        $delete->delete();        $reader = new ContentActionReader();        foreach ($reader->getData() as $actionCustomRow) {            $action = $actionCustomRow->getAction();            $action->deleteActionContent($contentType);        }        $this->removeContentType($contentType);        return $this;    }    private function removeContentType(AbstractContentType $contentType)    {        (new ContentTypeDelete())->deleteById($contentType->typeId);        $delete = new ContentViewDelete();        $delete->filter->andEqual($delete->model->contentTypeId, $contentType->typeId);        $delete->delete();        $delete = new ViewContentTypeDelete();        $delete->filter->andEqual($delete->model->contentTypeId, $contentType->typeId);        $delete->delete();        return $this;    }}