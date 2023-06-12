<?php
namespace Nemundo\ContentTest\App\Gastro\Data\GastroErfassung;
class GastroErfassungModel extends \Nemundo\Model\Definition\Model\AbstractModel {
/**
* @var \Nemundo\Model\Type\Id\IdType
*/
public $id;

/**
* @var \Nemundo\Model\Type\Text\TextType
*/
public $gastro;

protected function loadModel() {
$this->tableName = "gastro_gastro_erfassung";
$this->aliasTableName = "gastro_gastro_erfassung";
$this->label = "Gastro Erfassung";

$this->primaryIndex = new \Nemundo\Db\Index\AutoIncrementIdPrimaryIndex();

$this->id = new \Nemundo\Model\Type\Id\IdType($this);
$this->id->tableName = "gastro_gastro_erfassung";
$this->id->externalTableName = "gastro_gastro_erfassung";
$this->id->fieldName = "id";
$this->id->aliasFieldName = "gastro_gastro_erfassung_id";
$this->id->label = "Id";
$this->id->allowNullValue = false;

$this->gastro = new \Nemundo\Model\Type\Text\TextType($this);
$this->gastro->tableName = "gastro_gastro_erfassung";
$this->gastro->externalTableName = "gastro_gastro_erfassung";
$this->gastro->fieldName = "gastro";
$this->gastro->aliasFieldName = "gastro_gastro_erfassung_gastro";
$this->gastro->label = "Gastro";
$this->gastro->allowNullValue = false;
$this->gastro->length = 255;

}
}