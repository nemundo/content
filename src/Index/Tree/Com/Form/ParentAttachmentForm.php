<?php

namespace Nemundo\Content\Index\Tree\Com\Form;

use Nemundo\Content\Index\Tree\Index\TreeIndexBuilder;

class ParentAttachmentForm extends AbstractAttachmentForm
{

    protected function onSubmit()
    {

        $builder = new TreeIndexBuilder($this->contentId);
        $builder->parentId =$this->contentListBox->getValue();
        $builder->buildIndex();

    }

}