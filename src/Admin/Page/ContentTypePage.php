<?php


namespace Nemundo\Content\Admin\Page;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\Admin\Site\ContentSite;
use Nemundo\Content\Admin\Site\ContentTypeSite;
use Nemundo\Content\Admin\Template\ContentTemplate;
use Nemundo\Content\Data\Content\ContentCount;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;

class ContentTypePage extends ContentTemplate
{

    public function getContent()
    {

        $layout=new BootstrapTwoColumnLayout($this);


        $table = new AdminClickableTable($layout->col1);

        $header = new TableHeader($table);
        $header->addText('Type');
        $header->addText('Class');
        $header->addText('Type Id');

        $header->addText('Item Count');


        $reader = new ContentTypeReader();
        $reader->addOrder($reader->model->contentType);
        foreach ($reader->getData() as $contentTypeRow) {

            $row = new BootstrapClickableTableRow($table);

            $row->addText($contentTypeRow->contentType);
            $row->addText($contentTypeRow->phpClass);
            $row->addText($contentTypeRow->id);

            $count = new ContentCount();
            $count->filter->andEqual($count->model->contentTypeId,$contentTypeRow->id);
            $row->addText((new Number( $count->getCount()))->formatNumber());

            $site = clone(ContentTypeSite::$site);  // clone(ContentSite::$site);
            $site->addParameter(new ContentTypeParameter($contentTypeRow->id));
            $row->addClickableSite($site);


        }

        $parameter=new ContentTypeParameter();
        if ($parameter->hasValue()) {

            $contentType=$parameter->getContentType();

            if ($contentType->hasAdmin()) {
                $contentType->getAdmin($layout->col2);
            }


        }



        return parent::getContent();

    }

}