<?php
namespace Nemundo\Content\Index\Geo\Data\GeoIndex;
class GeoIndexModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Geo\GeoCoordinateType
*/
public $coordinate;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $place;

/**
* @var \Nemundo\Model\Type\External\Id\NumberExternalIdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

/**
* @var \Nemundo\Model\Type\Text\LargeTextType
*/
public $description;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $imageUrl;

protected function loadModel() {
$this->tableName = "content_geo_index";
$this->aliasTableName = "content_geo_index";
$this->label = "Geo Index";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_geo_index";
$this->id->externalTableName = "content_geo_index";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_geo_index_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->coordinate = new \Nemundo\Model\Type\Geo\GeoCoordinateType($this);
$this->coordinate->tableName = "content_geo_index";
$this->coordinate->externalTableName = "content_geo_index";
$this->coordinate->fieldName = "coordinate";
$this->coordinate->aliasFieldName = "content_geo_index_coordinate";
$this->coordinate->label = "Coordinate";
$this->coordinate->allowNullValue = false;

$this->place = new \Nemundo\Model\Type\Text\TextType($this);
$this->place->tableName = "content_geo_index";
$this->place->externalTableName = "content_geo_index";
$this->place->fieldName = "place";
$this->place->aliasFieldName = "content_geo_index_place";
$this->place->label = "Place";
$this->place->allowNullValue = false;
$this->place->length = 255;

$this->contentId = new \Nemundo\Model\Type\External\Id\NumberExternalIdType($this);
$this->contentId->tableName = "content_geo_index";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "content_geo_index_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = false;

$this->description = new \Nemundo\Model\Type\Text\LargeTextType($this);
$this->description->tableName = "content_geo_index";
$this->description->externalTableName = "content_geo_index";
$this->description->fieldName = "description";
$this->description->aliasFieldName = "content_geo_index_description";
$this->description->label = "Description";
$this->description->allowNullValue = false;

$this->imageUrl = new \Nemundo\Model\Type\Text\TextType($this);
$this->imageUrl->tableName = "content_geo_index";
$this->imageUrl->externalTableName = "content_geo_index";
$this->imageUrl->fieldName = "image_url";
$this->imageUrl->aliasFieldName = "content_geo_index_image_url";
$this->imageUrl->label = "Image Url";
$this->imageUrl->allowNullValue = false;
$this->imageUrl->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "content";
$index->addType($this->contentId);

}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "content_geo_index_content");
$this->content->tableName = "content_geo_index";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "content_geo_index_content";
$this->content->label = "Content";
}
return $this;
}
}