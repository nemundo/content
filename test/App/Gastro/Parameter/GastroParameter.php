<?php
namespace Nemundo\ContentTest\App\Gastro\Parameter;
use Nemundo\Web\Parameter\AbstractUrlParameter;
class GastroParameter extends AbstractUrlParameter {
protected function loadParameter() {
$this->parameterName = 'gastro';
}
}