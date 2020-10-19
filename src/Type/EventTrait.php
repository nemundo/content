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

}