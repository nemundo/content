<?phpnamespace Nemundo\Content\Action;use Nemundo\Content\Action\View\DeleteActionView;class DeleteContentAction extends AbstractContentAction{    protected function loadAction()    {        $this->actionLabel = 'Delete';        $this->actionId = 'a6e848c9-3025-46e4-9583-ff7d1c1f6488';        $this->viewClass = DeleteActionView::class;    }}