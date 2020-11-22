<?php


namespace Nemundo\Content\View;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Web\Site\AbstractSite;

abstract class AbstractContentList extends AbstractHtmlContainer
{

    /**
     * @var AbstractContentType|AbstractTreeContentType
     */
    public $contentType;

    /**
     * @var AbstractSite
     */
    public $redirectSite;

}