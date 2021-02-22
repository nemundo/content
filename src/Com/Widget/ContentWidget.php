<?php

namespace Nemundo\Content\Com\Widget;


use Nemundo\Content\Action\ContentActionTrait;
use Nemundo\Content\Action\EditContentAction;
use Nemundo\Content\Builder\ContentViewBuilder;
use Nemundo\Content\Com\Dropdown\ContentActionDropdown;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Html\Block\Div;
use Nemundo\Html\Formatting\Italic;
use Nemundo\Html\Heading\H5;
use Nemundo\Package\Bootstrap\Card\BootstrapCard;

class ContentWidget extends BootstrapCard  // AdminWidget
{

    use ContentActionTrait;

    /**
     * @var AbstractContentType
     */
    public $contentType;

    public $viewId;

    public $widgetTitle;

    public function getContent()
    {

        $div = new Div($this->cardHeader);
        $div->addCssClass('d-flex justify-content-between align-items-center');

        $divTitle = new Div($div);


        $title = $this->widgetTitle;
        if ( $title== null) {
            $title=$this->contentType->getSubject();
        }

        $h5 = new H5($divTitle);
        $h5->content = $title;

        $divMenu = new Div($div);

        $dropdown = new ContentActionDropdown($divMenu);
        $dropdown->contentId = $this->contentType->getContentId();
        $dropdown->showToggle = false;

        foreach ($this->getContentActionList() as $action) {
            $dropdown->addContentAction($action);
        }



        $i = new Italic($dropdown->dropdownButton);
        $i->addCssClass('fa fa-ellipsis-v');




        if ($this->viewId == null) {

            $this->contentType->getDefaultView($this);
        } else {

            $builder = new ContentViewBuilder();
            $builder->contentType = $this->contentType;
            $builder->viewId = $this->viewId;
            $builder->getView($this);

        }


        return parent::getContent();

    }


}