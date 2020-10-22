<?php


namespace Nemundo\Content\Index\Search\Script;


use Nemundo\App\Script\Type\AbstractConsoleScript;
use Nemundo\Content\Index\Content\Data\Content\ContentReader;
use Nemundo\Content\Index\Search\Install\SearchIndexClean;

class SearchCleanScript extends AbstractConsoleScript
{

    protected function loadScript()
    {
        $this->scriptName = 'search-clean';
    }


    public function run()
    {

        (new SearchIndexClean())->cleanData();

    }

}