<?php

namespace Nemundo\Content\Action\View;

use Nemundo\Admin\Com\Button\AdminIconSiteButton;
use Nemundo\Content\Action\AbstractActionView;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Site\ContentDeleteSite;

class DeleteActionView extends AbstractActionView
{

    public function getContent()
    {

        $site = clone(ContentDeleteSite::$site);
        $site->addParameter(new ContentParameter($this->contentId));

        $btn = new AdminIconSiteButton($this);
        $btn->site = $site;

        return parent::getContent();

    }

}