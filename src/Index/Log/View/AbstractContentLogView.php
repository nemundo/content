<?php

namespace Nemundo\Content\Index\Log\View;

use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Html\Block\Div;

class AbstractContentLogView extends Div
{

    public $logDataId;

    /**
     * @var AdminLabelValueTable
     */
    private $table;


    protected function addLog($label, $change)
    {

        $this->table->addLabelValue($label, $change);
        return $this;

    }


    public function getContent()
    {
        $this->table = new AdminLabelValueTable($this);
        return parent::getContent();
    }

}