<?php

namespace Nemundo\Content\Index\Workflow\Type\Status;

use Nemundo\Content\Type\AbstractContentItem;

abstract class AbstractWorkflowStatusItem extends AbstractContentItem
{

    /**
     * @var AbstractWorkflowStatusType
     */
    public $contentType;

}