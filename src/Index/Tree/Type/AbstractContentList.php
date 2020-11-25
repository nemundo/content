<?php


namespace Nemundo\Content\Index\Tree\Type;


use Nemundo\Content\View\AbstractContentAdmin;
use Nemundo\Html\Container\AbstractHtmlContainer;


class AbstractContentList extends \Nemundo\Content\View\AbstractContentList  // AbstractHtmlContainer
{

    /**
     * @var string
     */
    public $parentId;

    /**
     * @var AbstractTreeContentType
     */
    public $contentType;


}