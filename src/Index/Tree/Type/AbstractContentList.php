<?php


namespace Nemundo\Content\Index\Tree\Type;


use Nemundo\Html\Container\AbstractHtmlContainer;


class AbstractContentList extends AbstractHtmlContainer
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