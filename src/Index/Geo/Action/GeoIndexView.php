<?php

namespace Nemundo\Content\Index\Geo\Action;

use Nemundo\Admin\Com\Table\AdminClickableTable;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Com\TableBuilder\TableHeader;
use Nemundo\Content\Action\AbstractActionView;
use Nemundo\Content\Data\ContentView\ContentView;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexReader;
use Nemundo\Content\Index\Geo\Parameter\GeoIndexParameter;
use Nemundo\Content\Index\Geo\Reader\GeoDistanceReader;
use Nemundo\Content\Index\Geo\Site\Kml\GeoContentKmlSite;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Site\ContentSite;
use Nemundo\Geo\Com\SearchMap\MapSearchCh;
use Nemundo\Package\Bootstrap\Table\BootstrapClickableTableRow;
use Nemundo\Package\FontAwesome\Icon\PlusIcon;

class GeoIndexView extends AbstractActionView
{

    public function getContent()
    {


        $geoReader = new GeoIndexReader();
        $geoReader->model->loadContent();
        $geoReader->model->content->loadContentType();
        $geoReader->filter->andEqual($geoReader->model->contentId, $this->contentId);
        //$geoReader->filter->andEqual($geoReader->model->contentId, $this->content->getContentId());


        $table = new AdminTable($this);


        foreach ($geoReader->getData() as $geoRow) {


            /*
            $map = new MapSearchCh($this);
            $map->*/


            $row = new AdminTableRow($table);
            $row->addText($geoRow->coordinate->getText());

            $site = clone(GeoContentKmlSite::$site);
            $site->addParameter(new GeoIndexParameter($geoRow->id));
            $row->addIconSite($site);

        }

        new PlusIcon($this);


        $form=new GeoIndexForm($this);
        $form->contentId = $this->contentId;



        $table = new AdminTable($this);

        $header = new TableHeader($table);
        $header->addText('Content');
        //$header->addText('Type');
        $header->addText('Distance');

        $reader = new GeoDistanceReader();
        $reader->contentId=$this->contentId;
        $reader->limit=10;
        foreach ($reader->getData() as $geoDistanceItem) {

            $row = new AdminTableRow($table);
            $row->addText($geoDistanceItem->subject);
            $row->addText($geoDistanceItem->getDistanceText());


            /*$site = clone(ContentView::Site::$site);
            $site->addParameter(new ContentParameter($geoDistanceItem->contentId));
            $row->addSite($site);*/


            //$row->addText((new Number($distanceRow->distance / 1000))->roundNumber(0) . ' km');

            /*if ($this->redirectSite !==null) {
                $site = clone($this->redirectSite);
                $site->addParameter(new ContentParameter($geoDistanceItem->contentId));
                $row->addClickableSite($site);
            }*/

        }




        return parent::getContent();

    }

}