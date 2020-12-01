<?php


namespace Nemundo\Content\Setup;


use Nemundo\App\Application\Setup\AbstractSetup;
use Nemundo\Content\Data\Content\ContentCount;
use Nemundo\Content\Data\Content\ContentDelete;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Data\ContentType\ContentType;
use Nemundo\Content\Data\ContentType\ContentTypeDelete;
use Nemundo\Content\Data\ContentType\ContentTypeId;
use Nemundo\Content\Data\ContentView\ContentView;
use Nemundo\Content\Data\View\View;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\AbstractType;
use Nemundo\Core\Language\Translation;

abstract class AbstractContentTypeSetup extends AbstractSetup
{

    protected function addContentType(AbstractType $contentType)
    {

        $contentLabel = (new Translation())->getText($contentType->typeLabel);
        if ($contentLabel == null) {
            $contentLabel = $contentType->getClassNameWithoutNamespace();
        }

        $data = new ContentType();
        $data->updateOnDuplicate = true;
        $data->id = $contentType->typeId;
        $data->contentType = $contentLabel;
        $data->phpClass = $contentType->getClassName();
        if ($this->application !== null) {
            $data->applicationId = $this->application->applicationId;
        }
        $data->setupStatus = true;
        $data->save();


        //$id=new ContentTypeId();
        //$id->filter->andEqual($id->model->i)

        foreach ($contentType->getViewList() as $view) {

            $data=new ContentView();
            $data->updateOnDuplicate=true;
            $data->contentTypeId=$contentType->typeId;
            $data->viewName=$view->viewName;
            $data->viewClass=$view->getClassName();
            $data->save();

        }






        return $this;
    }


    public function deleteContent(AbstractContentType $contentType)
    {

        $reader = new ContentReader();
        $reader->model->loadContentType();
        $reader->filter->andEqual($reader->model->contentTypeId, $contentType->typeId);
        foreach ($reader->getData() as $contentRow) {
            $contentType = $contentRow->getContentType();
            $contentType->deleteType();
        }

        $delete = new ContentDelete();
        $delete->filter->andEqual($reader->model->contentTypeId, $contentType->typeId);
        $delete->delete();


        return $this;

    }


    public function removeContent(AbstractContentType $contentType)
    {

        // hier nur von content typ
        //(new ContentCheckScript())->run();


        do {

            $reader = new ContentReader();
            $reader->model->loadContentType();
            $reader->filter->andEqual($reader->model->contentTypeId, $contentType->typeId);
            $reader->limit = 1000;
            foreach ($reader->getData() as $contentRow) {
                $contentType = $contentRow->getContentType();
                $contentType->deleteType();
            }

            $count = new ContentCount();
            $count->filter->andEqual($count->model->contentTypeId, $contentType->typeId);
            $contentCount = $count->getCount();

        } while ($contentCount > 0);


        /*
        $delete = new WordContentTypeDelete();
        $delete->filter->andEqual($delete->model->contentTypeId, $contentType->typeId);
        $delete->delete();*/


        return $this;

    }


    public function removeContentType(AbstractContentType $contentType)
    {

        $this->removeContent($contentType);
        (new ContentTypeDelete())->deleteById($contentType->typeId);

        return $this;
    }


}