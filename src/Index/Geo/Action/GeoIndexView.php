<?php

namespace Nemundo\Content\Index\Geo\Action;

use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Content\Action\AbstractActionView;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndexReader;
use Nemundo\Content\Index\Geo\Parameter\GeoIndexParameter;
use Nemundo\Content\Index\Geo\Site\Kml\GeoContentKmlSite;
use Nemundo\Geo\Com\SearchMap\MapSearchCh;
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





        return parent::getContent();

    }

}