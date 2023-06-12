<?php

namespace Nemundo\ContentTest\App\Gastro\Content\GastroErfassung;

use Nemundo\Admin\Com\ListBox\AdminTextBox;
use Nemundo\Content\Form\AbstractContentForm;

class GastroErfassungForm extends AbstractContentForm
{

    /**
     * @var AdminTextBox
     */
    public $gastro;

    public function getContent()
    {

        $this->gastro= new AdminTextBox($this);
        $this->gastro->label='Gastro';

        return parent::getContent();
    }

    protected function onSave()
    {

        $builder = new GastroErfassungBuilder();
        $builder->gastro= $this->gastro->getValue();
        $builder->buildContent();

    }
}