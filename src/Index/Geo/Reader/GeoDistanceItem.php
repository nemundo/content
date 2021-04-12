<?php


namespace Nemundo\Content\Index\Geo\Reader;


use Nemundo\Content\Builder\ContentBuilder;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Type\Number\Number;

class GeoDistanceItem extends AbstractBase
{

    public $contentId;

    public $distance;

    public function getContent()
    {

        $content = (new ContentBuilder())->getContent($this->contentId);
        return $content;

    }


    public function getDistanceText()
    {

        $text = (new Number($this->distance / 1000))->roundNumber(0) . ' km';
        return $text;

    }


}