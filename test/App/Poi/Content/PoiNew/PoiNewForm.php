<?php

namespace Nemundo\ContentTest\App\Poi\Content\PoiNew;

use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Content\Form\AbstractContentForm;

class PoiNewForm extends AbstractContentForm
{

    /**
     * @var AdminTextBox
     */
    private $poi;

    public function getContent()
    {

        $this->poi = new AdminTextBox($this);
        $this->poi->label = 'Poi';

        return parent::getContent();

    }


    protected function onSave()
    {

        $builder = new PoiNewBuilderWorkflow();
        $builder->poi = $this->poi->getValue();
        $builder->buildContent();

    }
}