<?php


namespace Nemundo\Content\Index\Tree\Com\Container;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Content\App\Explorer\Site\ContentEditSite;
use Nemundo\Content\App\Explorer\Site\ContentRemoveSite;
use Nemundo\Content\App\Explorer\Site\ContentSortableSite;
use Nemundo\Content\App\Explorer\Site\ItemSite;
use Nemundo\Content\Com\Form\ContentViewChangeForm;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ParentParameter;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Package\Bootstrap\Jumbotron\BootstrapJumbotron;
use Nemundo\Package\JqueryUi\Sortable\JquerySortable;
use Nemundo\Web\Site\AbstractSite;

class SortableContentContainer extends AbstractHtmlContainer
{

    /**
     * @var AbstractTreeContentType
     */
    public $contentType;

    /**
     * @var bool
     */
    public $showEditIcon = true;

    /**
     * @var bool
     */
    public $showRemoveIcon = true;

    /**
     * @var bool
     */
    public $showViewIcon = true;

    /**
     * @var AbstractSite
     */
    public $editRedirect;

    /**
     * @var AbstractSite
     */
    public $deleteRedirect;

    public function getContent()
    {

        $sortableDiv = new JquerySortable($this);
        $sortableDiv->id = 'cms_sortable_';
        $sortableDiv->sortableSite = ContentSortableSite::$site;

        foreach ($this->contentType->getChild() as $treeRow) {

            $itemDiv = new BootstrapJumbotron($sortableDiv);
            $itemDiv->id = 'item_' . $treeRow->id;

            $childContentType = $treeRow->getContentType();

            /*$p=new Paragraph($itemDiv);
            $p->content=$childContentType->getDefaultTreeViewId();*/

            $div = new Div($itemDiv);

            $childContentType->getDefaultTreeView($div);

            $div = new Div($itemDiv);

            if ($this->showRemoveIcon) {
                $btn = new AdminIconSiteButton($div);
                $btn->site = clone($this->deleteRedirect);  //ContentRemoveSite::$site);
                $btn->site->addParameter(new ParentParameter($this->contentType->getContentId()));
                $btn->site->addParameter(new ContentParameter($treeRow->id));
            }

            if ($this->showEditIcon) {
                $btn = new AdminIconSiteButton($div);
                $btn->site =clone($this->editRedirect);  // clone(ContentEditSite::$site);
                $btn->site->addParameter(new ContentParameter($treeRow->id));
            }

            if ($this->showViewIcon) {
                $btn = new AdminIconSiteButton($div);
                $btn->site = clone(ItemSite::$site);
                $btn->site->addParameter(new ContentParameter($treeRow->id));
            }

            $form = new ContentViewChangeForm($div);
            $form->contentType=$childContentType;

        }

        return parent::getContent();

    }

}