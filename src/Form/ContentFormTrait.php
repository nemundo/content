<?php


namespace Nemundo\Content\Form;


use Nemundo\Core\Debug\Debug;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;

trait ContentFormTrait
{

    /**
     * @var AbstractTreeContentType
     */
    public $contentType;

    /**
     * @var bool
     */
    public $appendParameter = false;

    protected function loadUpdateForm()
    {
        (new Debug())->write('Function loadUpdateForm not defined');
    }

}