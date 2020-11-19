<?php


namespace Nemundo\Content\Admin\Page;


use Nemundo\Admin\Com\Button\AdminSearchButton;
use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\App\Application\Com\ApplicationListBox;
use Nemundo\App\Application\Parameter\ApplicationParameter;
use Nemundo\Com\FormBuilder\SearchForm;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\Admin\Site\ContentTypeRemoveSite;
use Nemundo\Content\Admin\Site\ContentTypeSite;
use Nemundo\Content\Admin\Site\Json\ContentTypeJsonSite;
use Nemundo\Content\Admin\Template\ContentTemplate;
use Nemundo\Content\Com\ListBox\ContentTypeListBox;
use Nemundo\Content\Data\Content\ContentCount;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Package\Bootstrap\Form\BootstrapFormRow;
use Nemundo\Package\Bootstrap\FormElement\BootstrapTextBox;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\User\Com\ListBox\UserListBox;

class ContentTypePage extends ContentTemplate
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 4;
        $layout->col2->columnWidth = 8;


        $form = new SearchForm($layout->col1);

        $formRow = new BootstrapFormRow($form);

        $application=new ApplicationListBox($formRow);
        $application->submitOnChange = true;
        $application->searchMode = true;

        new AdminSearchButton($formRow);


        $contentTypeReader = new ContentTypeReader();
        $contentTypeReader->model->loadApplication();

        if ($application->hasValue()) {
            $contentTypeReader->filter->andEqual($contentTypeReader->model->applicationId,$application->getValue());
        }

        $contentTypeReader->addOrder($contentTypeReader->model->contentType);

        $table = new AdminClickableTable($layout->col1);

        $header = new TableHeader($table);
        $header->addText('Type');
        $header->addText('Class');
        $header->addText('Type Id');

        $header->addText($contentTypeReader->model->application->label);
        $header->addText('Item Count');


        foreach ($contentTypeReader->getData() as $contentTypeRow) {

            $row = new BootstrapClickableTableRow($table);

            $row->addText($contentTypeRow->contentType);
            $row->addText($contentTypeRow->phpClass);
            $row->addText($contentTypeRow->id);
            $row->addText($contentTypeRow->application->application);

            $count = new ContentCount();
            $count->filter->andEqual($count->model->contentTypeId, $contentTypeRow->id);
            $row->addText((new Number($count->getCount()))->formatNumber());

            $site = clone(ContentTypeSite::$site);
            $site->addParameter(new ApplicationParameter());
            $site->addParameter(new ContentTypeParameter($contentTypeRow->id));
            $row->addClickableSite($site);

        }

        $parameter = new ContentTypeParameter();
        if ($parameter->hasValue()) {

            $contentType = $parameter->getContentType();

            $btn=new AdminSiteButton($layout->col2);
            $btn->site=clone(ContentTypeJsonSite::$site);
            $btn->site->addParameter($parameter);

            $btn=new AdminSiteButton($layout->col2);
            $btn->site=clone(ContentTypeRemoveSite::$site);
            $btn->site->addParameter($parameter);



            if ($contentType->hasAdmin()) {
                $contentType->getAdmin($layout->col2);
            }

        }





        return parent::getContent();

    }

}