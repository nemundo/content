<?php


namespace Nemundo\Content\Admin\Site;


use Nemundo\Admin\Com\Navigation\AdminNavigation;
use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\Admin\Page\ContentTypePage;
use Nemundo\Core\Type\Number\Number;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Content\Data\Content\ContentCount;
use Nemundo\Content\Data\ContentType\ContentTypeReader;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Web\Site\AbstractSite;

class ContentTypeSite extends AbstractSite
{

    /**
     * @var ContentTypeSite
     */
    public static $site;

    protected function loadSite()
    {
        $this->title = 'Content Type';
        $this->url = 'content-type';
        ContentTypeSite::$site=$this;

    }

    public function loadContent()
    {


        (new ContentTypePage())->render();


        /*

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $nav = new AdminNavigation($page);
        $nav->site=ContentSite::$site;

        $table = new AdminClickableTable($page);

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

            $site = clone(ContentSite::$site);
            $site->addParameter(new ContentTypeParameter($contentTypeRow->id));
            $row->addClickableSite($site);


        }


        /*
        $form = new SearchForm($page);

        $formRow = new BootstrapFormRow($form);

        $listbox = new ContentTypeListBox($formRow);
        //$listbox->name = (new ContentTypeParameter())->parameterName;
        $listbox->submitOnChange = true;
        $listbox->searchMode = true;

        $contentTypeParameter = new ContentTypeParameter();
        if ($contentTypeParameter->hasValue()) {
            //    $contentReader->filter->andEqual($contentReader->model->contentTypeId, $contentTypeParameter->getValue());

            $contentType = $contentTypeParameter->getContentType();

           // (new Debug())->write($contentType);


            if ($contentType->hasList()) {
                $contentType->getList($page);
            }


            if ($contentType->hasAdmin()) {
                $contentType->getAdmin($page);
            }


        }*/

        //$page->render();


    }


}