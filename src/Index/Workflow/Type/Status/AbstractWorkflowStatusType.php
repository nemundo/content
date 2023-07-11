<?php

namespace Nemundo\Content\Index\Workflow\Type\Status;

use Nemundo\Content\Index\Download\DownloadIndexTrait;
use Nemundo\Content\Index\File\ImageIndexTrait;
use Nemundo\Content\Type\AbstractContentItem;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Debug\Debug;

abstract class AbstractWorkflowStatusType extends AbstractContentType
{

    /**
     * @var bool
     */
    public $changeStatus = false;

    public $nextWorkflowStatusClass = [];


    public function getNextWorkflowStatusList()
    {

        /** @var AbstractContentType[] $list */
        $list = [];

        foreach ($this->nextWorkflowStatusClass as $statusClass) {
            $list[] = new $statusClass();
        }

        return $list;

    }


    /*public function getBuilder() {




        if ($this-> itemClass === null) {
            (new Debug())->write('No Item Class. ContentTyp Class: '.$this->getClassName());
            exit;
        }

        /** @var AbstractContentItem|ImageIndexTrait|DownloadIndexTrait $item */
      /*  $item = new $this->itemClass();

        return $item;


    }*/


}