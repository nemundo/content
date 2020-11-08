<?php


namespace Nemundo\Content\Admin\Page;


use Nemundo\Admin\Com\Button\AdminSiteButton;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\Admin\Site\ContentTypeSite;
use Nemundo\Content\Admin\Site\Json\ContentTypeJsonSite;
use Nemundo\Content\Admin\Template\ContentTemplate;
use Nemundo\Content\Data\Content\ContentCount;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class ContentTypePage extends ContentTemplate
{

    public function getContent()
    {

        $layout = new BootstrapTwoColumnLayout($this);
        $layout->col1->columnWidth = 4;
        $layout->col2->columnWidth = 8;

        $reader = new ContentTypeReader();
        $reader->model->loadApplication();
        $reader->addOrder($reader->model->contentType);

        $table = new AdminClickableTable($layout->col1);

        $header = new TableHeader($table);
        $header->addText('Type');
        $header->addText('Class');
        $header->addText('Type Id');

        $header->addText($reader->model->application->label);
        $header->addText('Item Count');


        foreach ($reader->getData() as $contentTypeRow) {

            $row = new BootstrapClickableTableRow($table);

            $row->addText($contentTypeRow->contentType);
            $row->addText($contentTypeRow->phpClass);
            $row->addText($contentTypeRow->id);
            $row->addText($contentTypeRow->application->application);

            $count = new ContentCount();
            $count->filter->andEqual($count->model->contentTypeId, $contentTypeRow->id);
            $row->addText((new Number($count->getCount()))->formatNumber());

            $site = clone(ContentTypeSite::$site);
            $site->addParameter(new ContentTypeParameter($contentTypeRow->id));
            $row->addClickableSite($site);

        }

        $parameter = new ContentTypeParameter();
        if ($parameter->hasValue()) {

            $contentType = $parameter->getContentType();

            $btn=new AdminSiteButton($layout->col2);
            $btn->site=clone(ContentTypeJsonSite::$site);
            $btn->site->addParameter($parameter);

            if ($contentType->hasAdmin()) {
                $contentType->getAdmin($layout->col2);
            }

        }





        return parent::getContent();

    }

}