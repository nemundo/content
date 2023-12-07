<?php

namespace Nemundo\Content\Index\Log\Type;

use Nemundo\Content\Index\Log\Data\Log\Log;
use Nemundo\Content\Index\Log\Data\Log\LogUpdate;
use Nemundo\Content\Index\Log\Status\DeleteStatus;
use Nemundo\Content\Type\AbstractContentRemove;

abstract class AbstractLogContentRemove extends AbstractContentRemove
{

    public function removeItem()
    {

        parent::removeItem();

        $data = new Log();
        $data->contentId = $this->contentType->getItem($this->dataId)->getContentId();
        $data->message = 'Log Message';
        $data->statusChange = true;
        $data->statusId = (new DeleteStatus())->id;
        $data->save();

    }


}