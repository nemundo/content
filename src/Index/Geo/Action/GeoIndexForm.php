<?php

namespace Nemundo\Content\Index\Geo\Action;

use Nemundo\Admin\Com\Form\Geo\AdminGeoCoordinateTextBox;
use Nemundo\Content\Action\AbstractActionForm;
use Nemundo\Content\Builder\ContentBuilder;
use Nemundo\Content\Index\Geo\Data\GeoIndex\GeoIndex;
use Nemundo\Package\Bootstrap\FormElement\BootstrapGeoCoordinate;

class GeoIndexForm extends AbstractActionForm
{

    /**
     * @var AdminGeoCoordinateTextBox
     */
    private $coordinate;

    public function getContent()
    {


        $this->coordinate=new AdminGeoCoordinateTextBox($this);

        return parent::getContent();

    }


    protected function onSubmit()
    {

        $item = (new ContentBuilder($this->contentId))->getContentItem();

        /*$aciton = new GeoIndexContentAction();
        $aciton->onAction($item);*/

        $data = new GeoIndex();
        $data->updateOnDuplicate = true;
        $data->place = $item->getSubject();
        $data->coordinate = $this->coordinate->getGeoCoordinate();  // $item->getCoordinate();
        $data->contentId = $item->getContentId();
        $data->description = $item->getText();
        //$data->imageUrl = $item->getImageUrl();
        $data->save();



    }


}