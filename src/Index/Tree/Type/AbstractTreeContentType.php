<?php


namespace Nemundo\Content\Index\Tree\Type;


use Nemundo\Content\Index\Search\Type\SearchIndexTrait;
use Nemundo\Content\Type\AbstractContentType;


abstract class AbstractTreeContentType extends AbstractContentType
{

    use TreeIndexTrait;
    use SearchIndexTrait;

    public function saveType()
    {

        $this->saveData();
        $this->saveContent();
        $this->saveTree();
        $this->onFinished();
        $this->saveIndex();

        foreach ($this->eventList as $event) {
            $event->onCreate($this);
            $event->onUpdate($this);
        }

    }


    public function saveIndex()
    {

        parent::saveIndex();

        $this->saveContentIndex();
        $this->saveSearchIndex();


    }


    protected function onFinished()
    {

    }


    public function deleteType()
    {

        parent::deleteType();
        $this->deleteTree();
        $this->deleteSearchIndex();

    }


    public function getText()
    {

        $text = '';
        return $text;

    }


    public function setActive()
    {
        $this->onActive();
        $this->saveIndex();
    }


    public function setInactive()
    {
        $this->onInactive();
        $this->saveIndex();
    }


    protected function onActive()
    {

    }

    protected function onInactive()
    {

    }

    protected function isActive()
    {
        return true;
    }


}