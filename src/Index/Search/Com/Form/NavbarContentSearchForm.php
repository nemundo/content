<?php

namespace Nemundo\Content\Index\Search\Com\Form;


use Nemundo\Admin\Com\Button\AdminSearchButton;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Index\Search\Parameter\SearchQueryParameter;
use Nemundo\Content\Index\Search\Site\Json\SearchJsonSite;
use Nemundo\Core\Language\LanguageCode;
use Nemundo\Html\Character\HtmlCharacter;
use Nemundo\Html\Form\Button\SubmitButton;
use Nemundo\Html\Form\Input\TextInput;
use Nemundo\Package\Bootstrap\Autocomplete\BootstrapAutocompleteMultipleValueTextBox;
use Nemundo\Package\Bootstrap\Layout\Grid\BootstrapRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\JqueryUi\Autocomplete\AutocompleteMultipleValueTextInput;


class NavbarContentSearchForm extends SearchForm
{

    /**
     * @var BootstrapTextBox
     */
    private $query;

    public function getContent()
    {

        //$formRow = new BootstrapRow($this);

        $this->addCssClass('d-flex');

        //$this->query = new TextInput($this);  //
        // new BootstrapAutocompleteMultipleValueTextBox($this);

        $this->query = new AutocompleteMultipleValueTextInput($this);  // new BootstrapAutocompleteMultipleValueTextBox($this);
        $this->query->name = (new SearchQueryParameter())->parameterName;
        $this->query->id = (new SearchQueryParameter())->parameterName;

        $this->query->value = (new SearchQueryParameter())->getValue();
        $this->query->seperator = ' ';
        //$this->query->searchMode = true;
        //$this->query->column = true;
        //$this->query->columnSize = 4;
        $this->query->placeholder[LanguageCode::EN] = 'Search';
        $this->query->placeholder[LanguageCode::DE] = 'Suche';
        //$this->query->label = HtmlCharacter::NON_BREAKING_SPACE;
        $this->query->sourceSite = SearchJsonSite::$site;
        $this->query->addCssClass('form-control me-2');

        $button = new SubmitButton($this);  // new AdminSearchButton($formRow);
        $button->label = 'Search';
        $button->addCssClass('btn btn-secondary');


        return parent::getContent();

    }

}