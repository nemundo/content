<?php


namespace Nemundo\Content\Index\Search\Reader;


use Nemundo\Core\Base\AbstractBase;
use Nemundo\Web\Site\AbstractSite;

class SearchItem extends AbstractBase
{

    public $subject;

    public $text;

    /**
     * @var AbstractSite
     */
    public $site;

    public $typeLabel;

    public $dataId;

    public $contentId;

}