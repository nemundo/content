<?php
namespace Nemundo\ContentTest\App\Gastro\Data\Gastro;
class GastroExternalType extends \Nemundo\Model\Type\External\ExternalType {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $gastro;

protected function loadExternalType() {
parent::loadExternalType();
$this->externalModelClassName = GastroModel::class;
$this->externalTableName = "gastro_gastro";
$this->aliasTableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id = new \Nemundo\Model\Type\Id\IdType();
$this->id->fieldName = "id";
$this->id->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->id->externalTableName = $this->externalTableName;
$this->id->aliasFieldName = $this->id->tableName . "_" . $this->id->fieldName;
$this->id->label = "Id";
$this->addType($this->id);

$this->gastro = new \Nemundo\Model\Type\Text\TextType();
$this->gastro->fieldName = "gastro";
$this->gastro->tableName = $this->parentFieldName . "_" . $this->externalTableName;
$this->gastro->externalTableName = $this->externalTableName;
$this->gastro->aliasFieldName = $this->gastro->tableName . "_" . $this->gastro->fieldName;
$this->gastro->label = "Gastro";
$this->addType($this->gastro);

}
}