<?php

namespace Nemundo\Content\Index\Workflow\Setup;


use Nemundo\Content\Index\Workflow\Data\Process\Process;
use Nemundo\Content\Index\Workflow\Type\Process\AbstractProcess;
use Nemundo\Content\Setup\AbstractContentTypeSetup;

//ProcessSetup
class ProcessSetup extends AbstractContentTypeSetup
{


    // addProcess
    public function addProcess(AbstractProcess $process)
    {

        $data = new Process();
        $data->ignoreIfExists = true;
        $data->contentTypeId = $process->typeId;
        $data->save();

        parent::addContentType($process);

    }



    // remove


}