<?php


namespace Nemundo\Content\Type;

use Nemundo\Content\Event\AbstractContentEvent;

trait EventTrait
{

    /**
     * @var AbstractContentEvent[]
     */
    protected $eventList = [];

    public function addEvent(AbstractContentEvent $contentEvent)
    {

        $this->eventList[] = $contentEvent;
        return $this;

    }


    public function getEventList() {
        return $this->eventList;
    }


/*
    public function saveEventOnCreate() {

        foreach ($this->eventList as $event) {
            $event->onCreate($this);
            //$event->onUpdate($this);
        }

    }*/


}