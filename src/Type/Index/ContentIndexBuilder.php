<?php

namespace Nemundo\Content\Type\Index;


use Nemundo\Content\Data\Content\Content;
use Nemundo\Content\Data\Content\ContentCount;
use Nemundo\Content\Data\Content\ContentDelete;
use Nemundo\Content\Data\ContentType\ContentTypeDelete;

class ContentIndexBuilder extends AbstractIndexBuilder
{

    public function buildIndex()
    {

        $count = new ContentCount();
        $count->filter->andEqual($count->model->contentTypeId, $this->contentType->typeId);
        $count->filter->andEqual($count->model->dataId, $this->contentType->getDataId());
        if ($count->getCount() == 0) {

            $data = new Content();
            $data->contentTypeId = $this->contentType->typeId;
            $data->dataId = $this->contentType->getDataId();
            $data->subject = $this->contentType->getSubject();
            $data->save();

        }

        return $this;

    }


    public function deleteIndex() {



    }



    public function removeAllIndex()
    {

        $delete = new ContentDelete();
        $delete->filter->andEqual($delete->model->contentTypeId, $this->contentType->typeId);
        $delete->delete();

        (new ContentTypeDelete())->deleteById($this->contentType->typeId);




    }


}