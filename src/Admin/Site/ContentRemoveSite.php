<?php


namespace Nemundo\Content\Admin\Site;


use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ParentParameter;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;

class ContentRemoveSite extends AbstractDeleteIconSite
{

    /**
     * @var ContentRemoveSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title = 'Remove Content';
        $this->url = 'remove-content';
        //$this->menuActive = false;

        ContentRemoveSite::$site = $this;

    }


    public function loadContent()
    {

        $contentParameter = new ContentParameter();
        $contentParameter->contentTypeCheck = false;
        $contentType = $contentParameter->getContentType();

        $parentContentType = (new ParentParameter())->getContentType(false);
        $parentContentType->removeChild($contentType->getContentId());

        (new UrlReferer())->redirect();

    }

}