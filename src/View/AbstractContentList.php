<?php


namespace Nemundo\Content\View;


use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Content\Parameter\DataIdParameter;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Web\Parameter\AbstractUrlParameter;
use Nemundo\Web\Site\AbstractSite;

abstract class AbstractContentList extends AbstractHtmlContainer
{

    /**
     * @var AbstractContentType|AbstractTreeContentType
     */
    public $contentType;

    /**
     * @var AbstractSite
     */
    public $redirectSite;


    protected function getRedirectSite($dataId) {

        $site = clone($this->redirectSite);
        $site->addParameter(new DataIdParameter($dataId));
        //$site->addParameter(new ContentParameter($this->contentType->getContentId()));

        return $site;

    }



//$site->addParameter(new DataIdParameter($stationRow->id));


}