<?php


namespace Nemundo\Content\Com\Container;


use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Content\App\Explorer\Site\ContentEditSite;
use Nemundo\Content\App\Explorer\Site\ContentSortableSite;
use Nemundo\Content\App\Explorer\Site\ItemSite;
use Nemundo\Content\App\Explorer\Site\ContentRemoveSite;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ParentParameter;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\Bootstrap\Jumbotron\BootstrapJumbotron;
use Nemundo\Package\JqueryUi\Sortable\JquerySortable;

class SortableContentContainer extends AbstractHtmlContainer
{

    /**
     * @var AbstractTreeContentType
     */
    public $contentType;

    public function getContent()
    {


        $sortableDiv = new JquerySortable($this);
        $sortableDiv->id = 'cms_sortable_';
        $sortableDiv->sortableSite = ContentSortableSite::$site;


        foreach ($this->contentType->getChild() as $treeRow) {

            $itemDiv = new BootstrapJumbotron($sortableDiv);  //  new Div($sortableDiv);
            $itemDiv->id = 'item_' . $treeRow->id;

            $div = new Div($itemDiv);
            $treeRow->getContentType()->getView($div);

            $div = new Div($itemDiv);

            $btn = new AdminIconSiteButton($div);
            $btn->site = clone(ContentRemoveSite::$site);
            $btn->site->addParameter(new ParentParameter($this->contentType->getContentId()));
            $btn->site->addParameter(new ContentParameter($treeRow->id));

            $btn = new AdminIconSiteButton($div);
            $btn->site = clone(ContentEditSite::$site);
            $btn->site->addParameter(new ContentParameter($treeRow->id));

            $btn = new AdminIconSiteButton($div);
            $btn->site = clone(ItemSite::$site);
            $btn->site->addParameter(new ContentParameter($treeRow->id));



        }



        return parent::getContent();

    }

}