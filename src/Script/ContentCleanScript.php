<?php


namespace Nemundo\Content\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Core\Debug\Debug;
use Nemundo\Content\Data\Content\ContentReader;
use Nemundo\Content\Data\Content\ContentUpdate;
use Nemundo\Content\Install\ContentInstall;
use Nemundo\Content\Install\ContentUninstall;

class ContentCleanScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'content-clean';
    }


    public function run()
    {


        $reader = new ContentReader();
        $reader->model->loadContentType();
        foreach ($reader->getData() as $contentRow) {

            $contentType = $contentRow->getContentType();

            if ($contentType->existItem()) {

            }

            //$contentType->deleteType();

        }



        //(new ContentUninstall())->uninstall();
        //(new ContentInstall())->install();

    }

}