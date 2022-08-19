<?phpnamespace Nemundo\Content\Action;use Nemundo\Content\Data\Content\ContentDelete;use Nemundo\Content\Type\AbstractContentItem;use Nemundo\Content\Type\AbstractContentType;use Nemundo\Core\Base\AbstractBaseClass;use Nemundo\Html\Container\AbstractContainer;// AbstractContentAction// aufteilen auf:// AbstractContentActionType// AbstractContentActionabstract class AbstractContentAction extends AbstractBaseClass{    public $actionLabel;    public $actionId;    protected $formClass;    protected $viewClass;    // indexBuilder    public $actionBuilder = false;    /**     * @var AbstractContentType     */    protected $content;    public $contentTypeTraitClass;    abstract protected function loadAction();    // deleteAction    //abstract public function deleteIndex();    //public function __construct(AbstractContentType $content = null)    public function __construct()    {        //$this->content = $content;        $this->loadAction();    }    public function onAction(AbstractContentItem $item)    {    }// deleteAction(contentId)    public function deleteAction(AbstractContentItem $item)    {    }    /*    public function onMenuClick(AbstractContentType $content)    {        //(new Debug())->write('no function');    }*/    public function hasForm()    {        $value = false;        if ($this->formClass !== null) {            $value = true;        }        return $value;    }    public function getForm(AbstractContainer $parent = null)    {        $form = null;        if ($this->hasForm()) {            /** @var AbstractActionForm $form */            $form = new $this->formClass($parent);            //$form->content = $this->content;        }        return $form;    }    public function hasView()    {        $value = false;        if ($this->viewClass !== null) {            $value = true;        }        return $value;    }    public function getView(AbstractContainer $parent = null)    {        $view = null;        if ($this->hasView()) {            /** @var AbstractActionView $view */            $view = new $this->viewClass($parent);            //$view->contentId = $this->content;        }        return $view;    }}