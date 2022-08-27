<?phpnamespace Nemundo\Content\Builder;use Nemundo\Content\Data\Content\ContentReader;use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;use Nemundo\Content\Parameter\ContentParameter;use Nemundo\Content\Site\ContentDeleteSite;use Nemundo\Content\Site\ContentEditSite;use Nemundo\Content\Type\AbstractContentRemove;use Nemundo\Content\Type\AbstractContentType;use Nemundo\Content\Type\JsonContentTrait;use Nemundo\Core\Base\AbstractBase;use Nemundo\Html\Container\AbstractContainer;class ContentBuilder extends AbstractBase{    private $contentId;    public function __construct($contentId = null)    {        $this->contentId = $contentId;    }    public function getContent($contentId)    {        $reader = new ContentReader();        $reader->model->loadContentType();        $contentRow = $reader->getRowById($contentId);        $contentType = $contentRow->getContent();        /*        if ($checkContentType) {            $this->checkContentType($contentType);        }*/        return $contentType;    }    public function getRemove() {        $reader = new ContentReader();        $reader->model->loadContentType();        $contentRow = $reader->getRowById($this->contentId);        /** @var AbstractContentRemove $remove */        $remove = $contentRow->getContent()->getRemove($contentRow->dataId);        return $remove;    }    public function getDefaultView(AbstractContainer $parent = null)    {        $reader = new ContentReader();        $reader->model->loadContentType();        $contentRow = $reader->getRowById($this->contentId);        $contentType = $contentRow->contentType->getContentType();        $view = $contentType->getDefaultView($parent);        $view->dataId = $contentRow->dataId;        return $view;    }    public function getContentItem()    {        $reader = new ContentReader();        $reader->model->loadContentType();        $contentRow = $reader->getRowById($this->contentId);        $contentType = $contentRow->contentType->getContentType();        $item = $contentType->getItem($contentRow->dataId);  // getDefaultView($parent);        return $item;        //$view->dataId=$contentRow->dataId;    }    /*        public function getContent2($contentTypeId, $dataId) {            $reader = new ContentReader();            $reader->model->loadContentType();            $reader->filter->andEqual($reader->model->)            $contentRow = $reader->getRowById($contentId);            $contentType = $contentRow->getContentType();            /*            if ($checkContentType) {                $this->checkContentType($contentType);            }*/    /*    return $contentType;    }*/    public function getEditSite()    {        $site = clone(ContentEditSite::$site);        $site->addParameter(new ContentParameter($this->contentId));        return $site;    }    public function getDeleteSite()    {        $site = clone(ContentDeleteSite::$site);        $site->addParameter(new ContentParameter($this->contentId));        return $site;    }}