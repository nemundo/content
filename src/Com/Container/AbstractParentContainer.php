<?php


namespace Nemundo\Content\Com\Container;


use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Content\Type\AbstractTreeContentType;

class AbstractParentContainer extends AbstractHtmlContainer
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