<?php

namespace Nemundo\Content\Index\Geo\Site;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Com\TableBuilder\TableRow;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexPaginationReader;
use Nemundo\Dev\App\Factory\DefaultTemplateFactory;
use Nemundo\Model\Join\ModelJoin;
use Nemundo\Package\Bootstrap\Pagination\BootstrapPagination;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Content\Index\Config\ProcessConfig;
use Nemundo\Content\Index\Content\Data\Content\ContentModel;
use Nemundo\Content\Index\Geo\Data\Geo\GeoPaginationReader;
use Nemundo\Web\Site\AbstractSite;

class GeoIndexSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Geo';
        $this->url = 'geo';
    }

    public function loadContent()
    {

        $page = (new DefaultTemplateFactory())->getDefaultTemplate();

        $table = new AdminClickableTable($page);

        $header = new TableHeader($table);
        $header->addText('Content Type');
        $header->addText('Place');
        $header->addText('Coordinate');


        //$externalModel = new ContentModel();
        //$externalModel->loadContentType();

        $geoReader = new GeoIndexPaginationReader();
        $geoReader->model->loadContent();
        $geoReader->model->content->loadContentType();
        $geoReader->addOrder($geoReader->model->place);
        //$geoReader->paginationLimit=ProcessConfig::PAGINATION_LIMIT;

        /*$join = new ModelJoin($geoReader);
        $join->type = $geoReader->model->id;
        $join->externalModel = $externalModel;
        $join->externalType = $externalModel->id;

        $geoReader->addFieldByModel($externalModel);
        $geoReader->checkExternal($externalModel);*/

        foreach ($geoReader->getData() as $geoRow) {

            $row = new BootstrapClickableTableRow($table);

            $row->addText($geoRow->content->contentType->contentType);
            $row->addText($geoRow->place);
            $row->addText($geoRow->coordinate->getText());


            $contentType = $geoRow->content->getContentType();

            $row->addClickableSite($contentType->getViewSite());

            //$row->addText($geoRow->getModelValue($externalModel->contentType->contentType));


        }

        $pagination=new BootstrapPagination($page);
        $pagination->paginationReader = $geoReader;

        $page->render();


    }
}