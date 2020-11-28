<?php


namespace Nemundo\Content\View;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;

abstract class AbstractContentView extends AbstractHtmlContainer
{

    /**
     * @var AbstractContentType|AbstractTreeContentType
     */
    public $contentType;


    public $viewName='default';


}