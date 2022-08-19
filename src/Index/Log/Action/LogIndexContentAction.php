<?phpnamespace Nemundo\Content\Index\Log\Action;use Nemundo\Content\Action\AbstractContentAction;use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndex;use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;use Nemundo\Content\Index\Log\Data\Log\Log;use Nemundo\Content\Type\AbstractContentType;use Nemundo\Content\Type\AbstractType;class LogIndexContentAction extends AbstractContentAction{    /**     * @var GeoIndexTrait|AbstractContentType     */    protected $content;    protected function loadAction()    {        $this->actionLabel='Log Index';        $this->actionId='8f337697-7a8d-448c-9456-341a077f28d0';    }    /**     * @param AbstractContentType|GeoIndexTrait $item     * @return $this|void     */    public function onAction(AbstractContentType $item)    {        $data = new Log();        $data->contentId = $item->getContentId();        $data->save();        /*        $data = new GeoIndex();        $data->updateOnDuplicate = true;        $data->place = $content->getSubject();  // type->get $this->content->getSubject();        $data->coordinate =  $content->getCoordinate();        $data->contentId = $content->getContentId();        $data->description=$content->getDescription();        $data->imageUrl=$content->getImageUrl();        $data->save();*/        //return $this;    }}