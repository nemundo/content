<?php

namespace Nemundo\Content\Index\Workflow\Site;

use Nemundo\Content\Index\Workflow\Page\NotificationPage;
use Nemundo\Web\Site\AbstractSite;

class NotificationSite extends AbstractSite
{
    protected function loadSite()
    {
        $this->title = 'Notification';
        $this->url = 'notification';
    }

    public function loadContent()
    {
        (new NotificationPage())->render();
    }
}