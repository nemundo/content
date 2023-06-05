<?php

namespace Nemundo\ContentTest\Content\Poi;

use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Content\Form\AbstractContentForm;

class PoiForm extends AbstractContentForm
{

    /**
     * @var AdminTextBox
     */
    private $poi;

    public function getContent()
    {

        $this->poi = new AdminTextBox($this);
        $this->poi->label = 'POI';

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $poiRow = (new PoiItem($this->dataId))->getDataRow();
        $this->poi->value = $poiRow->poi;


    }


    protected function onSave()
    {

        $builder = new PoiBuilder($this->dataId);
        $builder->poi = $this->poi->getValue();
        $builder->buildContent();

    }


}