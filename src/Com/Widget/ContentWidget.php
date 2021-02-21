<?php

namespace Nemundo\Content\Com\Widget;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Content\Com\Dropdown\ContentActionDropdown;
use Nemundo\Content\Com\Input\ContentHiddenInput;
use Nemundo\Content\Com\ListBox\ContentViewListBox;
use Nemundo\Content\Data\ContentView\ContentViewReader;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\View\AbstractContentView;
use Nemundo\Html\Heading\H5;
use Nemundo\Html\Inline\Span;
use Nemundo\Package\Bootstrap\Card\BootstrapCard;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;

class ContentWidget extends BootstrapCard  // AdminWidget
{

    /**
     * @var AbstractContentType
     */
    public $contentType;


    public function getContent()
    {


        /*
        <div class="card">
  <div class="card-header">
    Featured
  </div>
  <div class="card-body">
    <h5 class="card-title">Special title treatment</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    <a href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>*/



        //$this->widgetTitle = $this->contentType->getSubject();


        $row = new BootstrapRow($this->cardHeader);

        $h5 = new H5($this->cardHeader);
        $h5->content = $this->contentType->getSubject();



        $dropdown = new ContentActionDropdown($row);  //$this->cardTitle);
        $dropdown->contentId = $this->contentType->getContentId();


        //$form=new ContentViewChangeForm($this->cardTitle);
        //$form->

        $form = new SearchForm($row);   // ($this->cardTitle);

        //$row = new BootstrapRow($form);

        $viewListBox = new ContentViewListBox($form);
        $viewListBox->contentType = $this->contentType;
        $viewListBox->submitOnChange = true;
        $viewListBox->searchMode = true;

        new ContentHiddenInput($form);






        if ($viewListBox->hasValue()) {

            $viewRow = (new ContentViewReader())->getRowById($viewListBox->getValue());

            $class = $viewRow->viewClass;

            /** @var AbstractContentView $view */
            $view = new $class($this);
            $view->contentType = $this->contentType;

        } else {
            $this->contentType->getDefaultView($this);
        }


        return parent::getContent();

    }


}