<?php

namespace Nemundo\Content\Site;

use Nemundo\App\Application\Usergroup\AppUsergroup;
use Nemundo\Content\Reader\ContentTypeDataReader;
use Nemundo\Web\Site\AbstractSite;

class ContentAdminSite extends AbstractSite
{

    /**
     * @var TestSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Content Admin';
        $this->url = 'content-admin';
        /*$this->restricted = true;
        $this->addRestrictedUsergroup(new AppUsergroup());*/

        ContentAdminSite::$site = $this;

        $reader = new ContentTypeDataReader();
        foreach ($reader->getData() as $contentTypeRow) {

            $contentType = $contentTypeRow->getContentType();

            if ($contentType->hasAdmin()) {

                $site = new ContentAdminItemSite($this);
                $site->title = $contentType->typeLabel;
                $site->url = $contentType->typeId;

            }

        }


    }

    public function loadContent()
    {

    }
}