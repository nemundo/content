<?php


namespace Nemundo\Content\Admin\Site\Container;


use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Core\Http\Response\HttpResponse;
use Nemundo\Web\Site\AbstractSite;

class ContentContainerSite extends AbstractSite
{

    /**
     * @var ContentContainerSite
     */
    public static $site;

    protected function loadSite()
    {

        $this->title='Content Container';
        $this->url='content-container';
        ContentContainerSite::$site=$this;

    }


    public function loadContent()
    {

        $contentType = (new ContentParameter())->getContentType(false);
        $view=$contentType->getView();

        $response = new HttpResponse();
        $response->content=$view->getContent();
        $response->sendResponse();



        // TODO: Implement loadContent() method.
    }

}