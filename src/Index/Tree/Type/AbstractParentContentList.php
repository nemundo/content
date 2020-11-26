<?php


namespace Nemundo\Content\Index\Tree\Type;


use Nemundo\Content\View\AbstractContentAdmin;
use Nemundo\Content\View\AbstractContentList;
use Nemundo\Html\Container\AbstractHtmlContainer;


class AbstractParentContentList extends AbstractContentList
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