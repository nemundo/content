<?phpnamespace Nemundo\Content\Setup;use Nemundo\App\Application\Setup\AbstractSetup;use Nemundo\Content\Data\Content\ContentCount;use Nemundo\Content\Data\Content\ContentDelete;use Nemundo\Content\Data\Content\ContentReader;use Nemundo\Content\Data\ContentType\ContentType;use Nemundo\Content\Data\ContentType\ContentTypeCount;use Nemundo\Content\Data\ContentType\ContentTypeDelete;use Nemundo\Content\Data\ContentType\ContentTypeUpdate;use Nemundo\Content\Data\ContentView\ContentView;use Nemundo\Content\Data\ContentView\ContentViewCount;use Nemundo\Content\Data\ContentView\ContentViewDelete;use Nemundo\Content\Data\ContentView\ContentViewUpdate;use Nemundo\Content\Data\ViewContentType\ViewContentType;use Nemundo\Content\Data\ViewContentType\ViewContentTypeCount;use Nemundo\Content\Data\ViewContentType\ViewContentTypeDelete;use Nemundo\Content\Type\AbstractContentType;use Nemundo\Content\Type\AbstractType;use Nemundo\Content\Type\ViewTrait;use Nemundo\Core\Debug\Debug;use Nemundo\Core\Language\Translation;use Nemundo\Core\Log\LogMessage;abstract class AbstractContentTypeSetup extends AbstractSetup{    protected function addContentType(AbstractContentType $contentType)    {        /*$contentLabel = (new Translation())->getText($contentType->typeLabel);        if ($contentLabel == null) {            $contentLabel = $contentType->getClassNameWithoutNamespace();        }*/        $count = new ContentTypeCount();        $count->filter->andEqual($count->model->id, $contentType->typeId);        if ($count->getCount() == 0) {            $data = new ContentType();            $data->id = $contentType->typeId;            $data->contentType = $contentType->getTypeLabel();  // $contentLabel;            $data->phpClass = $contentType->getClassName();            if ($this->application !== null) {                $data->applicationId = $this->application->applicationId;            }            $data->setupStatus = true;            $data->save();        } else {            $update = new ContentTypeUpdate();            $update->contentType = $contentType->getTypeLabel();  //$contentLabel;            $update->phpClass = $contentType->getClassName();            if ($this->application !== null) {                $update->applicationId = $this->application->applicationId;            }            $update->setupStatus = true;            $update->updateById($contentType->typeId);        }        if ($contentType->isObjectOfTrait(ViewTrait::class)) {            if ($contentType->hasView()) {                $count = new ViewContentTypeCount();                $count->filter->andEqual($count->model->contentTypeId, $contentType->typeId);                if ($count->getCount() == 0) {                    $data = new ViewContentType();                    $data->contentTypeId = $contentType->typeId;                    $data->save();                }            }            $update = new ContentViewUpdate();            $update->filter->andEqual($update->model->contentTypeId, $contentType->typeId);            $update->setupStatus = false;            $update->update();            foreach ($contentType->getViewList() as $view) {                $count = new ContentViewCount();                $count->filter->andEqual($update->model->id, $view->viewId);                if ($count->getCount() == 0) {                    $data = new ContentView();                    $data->id = $view->viewId;                    $data->contentTypeId = $contentType->typeId;                    $data->viewName = $view->viewName;                    $data->viewClass = $view->getClassName();                    $data->defaultView = $view->defaultView;                    $data->setupStatus = true;                    $data->save();                } else {                    $update = new ContentViewUpdate();                    $update->viewName = $view->viewName;                    $update->viewClass = $view->getClassName();                    $update->defaultView = $view->defaultView;                    $update->setupStatus = true;                    $update->updateById($view->viewId);                }            }            $delete = new ContentViewDelete();            $delete->filter->andEqual($update->model->contentTypeId, $contentType->typeId);            $delete->filter->andEqual($update->model->setupStatus, false);            $delete->delete();        }        return $this;    }}