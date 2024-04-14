<?phpnamespace Nemundo\Content\Type\Index;use Nemundo\Content\Action\AbstractContentAction;use Nemundo\Content\Data\Content\Content;use Nemundo\Content\Data\Content\ContentCount;use Nemundo\Content\Data\Content\ContentDelete;use Nemundo\Content\Data\Content\ContentUpdate;use Nemundo\Content\Type\AbstractContentItem;use Nemundo\Content\Type\AbstractContentType;class ContentIndexContentAction extends AbstractContentAction{    protected function loadAction()    {        $this->actionId='e6747792-03e4-4dbc-8892-830a632eaa0b';        $this->actionLabel='Content';        $this->actionBuilder = true;    }        public function onAction(AbstractContentItem $item)    {        $count = new ContentCount();        $count->filter->andEqual($count->model->contentTypeId, $item->contentType->typeId);        $count->filter->andEqual($count->model->dataId, $item->getDataId());        if ($count->getCount() == 0) {            $data = new Content();            $data->contentTypeId = $item->contentType->typeId;            $data->dataId = $item->getDataId();            $data->subject = $item->getSubject();            $data->save();        } else {            $update = new ContentUpdate();            $update->contentTypeId = $item->contentType->typeId;            $update->dataId = $item->getDataId();            $update->subject = $item->getSubject();            $update->updateById($item->getContentId());        }                return $this;    }    public function deleteAction(AbstractContentItem $item)    {        (new ContentDelete())->deleteById($item->getContentId());    }}