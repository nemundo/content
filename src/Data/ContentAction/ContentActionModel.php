<?php
namespace Nemundo\Content\Data\ContentAction;
class ContentActionModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $action;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $phpClass;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $menuActive;

/**
* @var \Nemundo\Model\Type\Number\YesNoType
*/
public $setupStatus;

protected function loadModel() {
$this->tableName = "content_action";
$this->aliasTableName = "content_action";
$this->label = "Content Action";

$this->primaryIndex = new \Nemundo\Db\Index\TextIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "content_action";
$this->id->externalTableName = "content_action";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "content_action_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->action = new \Nemundo\Model\Type\Text\TextType($this);
$this->action->tableName = "content_action";
$this->action->externalTableName = "content_action";
$this->action->fieldName = "action";
$this->action->aliasFieldName = "content_action_action";
$this->action->label = "Action";
$this->action->allowNullValue = false;
$this->action->length = 255;

$this->phpClass = new \Nemundo\Model\Type\Text\TextType($this);
$this->phpClass->tableName = "content_action";
$this->phpClass->externalTableName = "content_action";
$this->phpClass->fieldName = "php_class";
$this->phpClass->aliasFieldName = "content_action_php_class";
$this->phpClass->label = "Php Class";
$this->phpClass->allowNullValue = false;
$this->phpClass->length = 255;

$this->menuActive = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->menuActive->tableName = "content_action";
$this->menuActive->externalTableName = "content_action";
$this->menuActive->fieldName = "menu_active";
$this->menuActive->aliasFieldName = "content_action_menu_active";
$this->menuActive->label = "Menu Active";
$this->menuActive->allowNullValue = false;

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType($this);
$this->setupStatus->tableName = "content_action";
$this->setupStatus->externalTableName = "content_action";
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->aliasFieldName = "content_action_setup_status";
$this->setupStatus->label = "Setup Status";
$this->setupStatus->allowNullValue = false;

}
}