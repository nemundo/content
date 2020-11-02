<?php


namespace Nemundo\Content\Admin\Site;


use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\ContentTypeParameter;
use Nemundo\Content\Parameter\ParentParameter;
use Nemundo\Content\Setup\ContentTypeSetup;
use Nemundo\Package\FontAwesome\Site\AbstractDeleteIconSite;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\Core\Http\Url\UrlReferer;

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
        // TODO: Implement loadContent() method.

        // if (Envir StagingEnvironment::PRODUCTION)


        // nur in Dev/Test

        $contentParameter = new ContentParameter();
        $contentParameter->contentTypeCheck = false;
        $contentType = $contentParameter->getContentType();

        $parentContentType= (new ParentParameter())->getContentType(false);
        $parentContentType->removeChild($contentType->getContentId());


        //$setup = new ContentTypeSetup();
        //$setup->removeContent($contentType);

        (new UrlReferer())->redirect();

    }

}