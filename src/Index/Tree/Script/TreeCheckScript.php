<?php

namespace Nemundo\Content\Index\Tree\Script;

use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\Index\Tree\Application\TreeIndexApplication;

class TreeCheckScript extends AbstractConsoleScript
{
    protected function loadScript()
    {
        $this->scriptName = 'tree-check';
    }

    public function run()
    {


        /*
        $reader = new TreeReader();
        foreach ($reader->getData() as $treeRow) {


            if (!$this->checkContent($treeRow->parentId)) {
                (new Debug())->write('Parent is missing. Tree Id: ' . $treeRow->id);

                //$delete = new TreeContentDelete();
                //$delete->deleteContent();  // deleteById($treeRow->parentId);

                //(new TreeDelete())->deleteById($treeRow->id);
            }

            if (!$this->checkContent($treeRow->childId)) {
                (new Debug())->write('Child is missing. Tree Id: ' . $treeRow->id);

                //(new TreeDelete())->deleteById($treeRow->id);

            }


        }*/


    }
}