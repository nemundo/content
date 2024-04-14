<?php

namespace Nemundo\Content\Type;

use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\Builder\IndexBuilder;
use Nemundo\Core\Base\AbstractBase;

abstract class AbstractContentBuilder extends AbstractBase
{

    /**
     * @var AbstractContentType
     */
    protected $contentType;

    protected $dataId;

    /**
     * @var AbstractContentAction[]
     */
    private $actionList = [];


    public function __construct($dataId = null)
    {

        $this->dataId = $dataId;
        $this->loadBuilder();

    }

    abstract protected function loadBuilder();

    protected function onCreate()
    {

    }


    protected function onUpdate()
    {
        $this->onCreate();
    }


    protected function onFinished($newItem)
    {

    }


    public function getDataId()
    {
        return $this->dataId;
    }


    public function buildContent()
    {

        $newItem = false;
        if ($this->dataId === null) {
            $newItem = true;
            $this->onCreate();
        } else {
            $this->onUpdate();
        }

        if ($this->contentType !== null) {
            $item = $this->contentType->getItem($this->dataId);
            (new IndexBuilder())->buildIndex($item);
        }

        $item = $this->contentType->getItem($this->getDataId());
        foreach ($this->actionList as $action) {
            $action->onAction($item);
        }

        $this->onFinished($newItem);

        return $this->getDataId();

    }


    public function addAction(AbstractContentAction $action)
    {

        $this->actionList[] = $action;
        return $this;

    }


    /**
     * @param $actionList []
     * @return $this
     */
    public function addActionList($actionList)
    {

        $this->actionList = array_merge($this->actionList, $actionList);
        return $this;

    }

}