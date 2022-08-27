<?phpnamespace Nemundo\Content\Script;use Nemundo\App\Script\Type\AbstractConsoleScript;use Nemundo\Content\Data\Content\ContentCount;use Nemundo\Content\Data\Content\ContentDelete;use Nemundo\Content\Data\Content\ContentReader;use Nemundo\Content\Data\ContentType\ContentTypeCount;use Nemundo\Core\Debug\Debug;class ContentCheckScript extends AbstractConsoleScript{    protected function loadScript()    {        $this->scriptName = 'content-check';    }    public function run()    {        $reader = new ContentReader();        $reader->model->loadContentType();        foreach ($reader->getData() as $contentRow) {            $count = new ContentTypeCount();            $count->filter->andEqual($count->model->id, $contentRow->contentTypeId);            if ($count->getCount() == 0) {                (new Debug())->write('No Content Type. Content Id ' . $contentRow->id);                (new ContentDelete())->deleteById($contentRow->id);            }        }        $delete = new ContentDelete();        $delete->filter->andEqual($delete->model->contentTypeId, '');        $delete->delete();        // check data id        $reader = new ContentReader();        $reader->filter->andIsNull($reader->model->dataId);        foreach ($reader->getData() as $contentRow) {            (new Debug())->write('Data Id is Null. Content Id ' . $contentRow->id);        }        $delete = new ContentDelete();        $delete->filter->andIsNull($delete->model->dataId);        $delete->delete();    }}