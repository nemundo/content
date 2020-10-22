<?php

namespace Nemundo\Content\Form;

use Nemundo\Content\Form\AbstractContentForm;


// AbstractProcessStatusForm
abstract class AbstractSequenceForm extends AbstractContentForm
{

    protected function loadContainer()
    {

        parent::loadContainer();
        $this->submitButton->label = 'Weiter';

    }

/*
    protected function loadUpdateForm()
    {
    }*/


}