<?php


namespace Nemundo\Content\Index\Geo\Type;


use Nemundo\Core\Type\Geo\GeoCoordinate;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Content\Type\AbstractTreeContentType;



abstract class AbstractGeoContentType extends AbstractTreeContentType
{

    use GeoContentTypeTrait;

}