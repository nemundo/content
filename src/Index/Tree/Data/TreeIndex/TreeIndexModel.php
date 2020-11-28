<?php
namespace Nemundo\Content\Index\Tree\Data\TreeIndex;
class TreeIndexModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $parentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $parent;

/**
* @var \Nemundo\Model\Type\External\Id\ExternalIdType
*/
public $contentId;

/**
* @var \Nemundo\Content\Data\Content\ContentExternalType
*/
public $content;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $subject;

protected function loadModel() {
$this->tableName = "tree_tree_index";
$this->aliasTableName = "tree_tree_index";
$this->label = "Tree Index";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "tree_tree_index";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "tree_tree_index_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;
$this->id->visible->form = false;
$this->id->visible->table = false;
$this->id->visible->view = false;
$this->id->visible->form = false;

$this->parentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->parentId->tableName = "tree_tree_index";
$this->parentId->fieldName = "parent";
$this->parentId->aliasFieldName = "tree_tree_index_parent";
$this->parentId->label = "Parent";
$this->parentId->allowNullValue = true;

$this->contentId = new \Nemundo\Model\Type\External\Id\ExternalIdType($this);
$this->contentId->tableName = "tree_tree_index";
$this->contentId->fieldName = "content";
$this->contentId->aliasFieldName = "tree_tree_index_content";
$this->contentId->label = "Content";
$this->contentId->allowNullValue = true;

$this->subject = new \Nemundo\Model\Type\Text\TextType($this);
$this->subject->tableName = "tree_tree_index";
$this->subject->fieldName = "subject";
$this->subject->aliasFieldName = "tree_tree_index_subject";
$this->subject->label = "Subject";
$this->subject->allowNullValue = true;
$this->subject->length = 255;

$index = new \Nemundo\Model\Definition\Index\ModelIndex($this);
$index->indexName = "parent";
$index->addType($this->parentId);

$index = new \Nemundo\Model\Definition\Index\ModelUniqueIndex($this);
$index->indexName = "content";
$index->addType($this->contentId);

}
public function loadParent() {
if ($this->parent == null) {
$this->parent = new \Nemundo\Content\Data\Content\ContentExternalType($this, "tree_tree_index_parent");
$this->parent->tableName = "tree_tree_index";
$this->parent->fieldName = "parent";
$this->parent->aliasFieldName = "tree_tree_index_parent";
$this->parent->label = "Parent";
}
return $this;
}
public function loadContent() {
if ($this->content == null) {
$this->content = new \Nemundo\Content\Data\Content\ContentExternalType($this, "tree_tree_index_content");
$this->content->tableName = "tree_tree_index";
$this->content->fieldName = "content";
$this->content->aliasFieldName = "tree_tree_index_content";
$this->content->label = "Content";
}
return $this;
}
}