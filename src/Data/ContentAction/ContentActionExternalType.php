<?php
namespace Nemundo\Content\Data\ContentAction;
class ContentActionExternalType extends \Nemundo\Model\Type\External\ExternalType {
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

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = ContentActionModel::class;
$this->externalTableName = "content_action";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->action = new \Nemundo\Model\Type\Text\TextType();
$this->action->fieldName = "action";
$this->action->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->action->externalTableName = $this->externalTableName;
$this->action->aliasFieldName = $this->action->tableName . "_" . $this->action->fieldName;
$this->action->label = "Action";
$this->addType($this->action);

$this->phpClass = new \Nemundo\Model\Type\Text\TextType();
$this->phpClass->fieldName = "php_class";
$this->phpClass->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->phpClass->externalTableName = $this->externalTableName;
$this->phpClass->aliasFieldName = $this->phpClass->tableName . "_" . $this->phpClass->fieldName;
$this->phpClass->label = "Php Class";
$this->addType($this->phpClass);

$this->menuActive = new \Nemundo\Model\Type\Number\YesNoType();
$this->menuActive->fieldName = "menu_active";
$this->menuActive->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->menuActive->externalTableName = $this->externalTableName;
$this->menuActive->aliasFieldName = $this->menuActive->tableName . "_" . $this->menuActive->fieldName;
$this->menuActive->label = "Menu Active";
$this->addType($this->menuActive);

$this->setupStatus = new \Nemundo\Model\Type\Number\YesNoType();
$this->setupStatus->fieldName = "setup_status";
$this->setupStatus->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->setupStatus->externalTableName = $this->externalTableName;
$this->setupStatus->aliasFieldName = $this->setupStatus->tableName . "_" . $this->setupStatus->fieldName;
$this->setupStatus->label = "Setup Status";
$this->addType($this->setupStatus);

}
}