<?php

namespace Nemundo\ContentTest\App\Poi\Content\TestPoi;

use Nemundo\Admin\Com\ListBox\AdminLargeTextBox;
use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Content\Form\AbstractContentForm;
use Nemundo\ContentTest\App\Poi\Content\PoiNew\PoiNewBuilderWorkflow;
use Nemundo\ContentTest\Content\Poi\PoiItem;

class TestPoiForm extends AbstractContentForm
{

    /**
     * @var AdminTextBox
     */
    private $poi;


    /**
     * @var AdminLargeTextBox
     */
    private $description;


    public function getContent()
    {

        $this->poi = new AdminTextBox($this);
        $this->poi->label = 'Poi';

        $this->description = new AdminLargeTextBox($this);
        $this->description->label = 'Description';

        return parent::getContent();

    }


    protected function loadUpdateForm()
    {

        $poiRow = (new TestPoiItem($this->dataId))->getDataRow();

        $this->poi->value = $poiRow->poi;
        $this->description->value = $poiRow->description;

    }


    protected function onSave()
    {

        $builder = new TestPoiBuilder($this->dataId);
        $builder->poi = $this->poi->getValue();
        $builder->description = $this->description->getValue();
        $builder->buildContent();

    }

}