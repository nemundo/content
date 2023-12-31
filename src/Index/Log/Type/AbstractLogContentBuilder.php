<?php

namespace Nemundo\Content\Index\Log\Type;

use Nemundo\Content\Index\Log\Data\ContentLog\ContentLog;
use Nemundo\Content\Index\Log\Data\Log\Log;
use Nemundo\Content\Index\Log\Data\Log\LogUpdate;
use Nemundo\Content\Index\Log\Status\AbstractStatus;
use Nemundo\Content\Index\Log\Status\ActiveStatus;
use Nemundo\Content\Index\Log\Status\DraftStatus;
use Nemundo\Content\Type\AbstractContentBuilder;
use Nemundo\Core\Type\DateTime\DateTime;


abstract class AbstractLogContentBuilder extends AbstractContentBuilder
{

    private $logId;

    /**
     * @var AbstractStatus
     */
    private $status;


    public function __construct($dataId = null)
    {
        parent::__construct($dataId);
        $this->status = new DraftStatus();
    }


    public function buildContent()
    {

        $create = false;
        if ($this->dataId === null) {
            $create = true;
            $this->status = new ActiveStatus();
        }

        $data = new Log();
        $data->create = $create;

        if ($this->dataId === null) {
            $data->statusChange = true;
            $data->statusId = $this->status->id;
        } else {
            $data->statusChange = false;
        }

        $this->logId = $data->save();

        $dataId = parent::buildContent();

        $update = new LogUpdate();
        $update->contentId = $this->contentType->getItem($dataId)->getContentId();
        $update->updateById($this->getLogId());

        $this->saveContentLog();

        return $dataId;

    }


    protected function getLogId()
    {

        return $this->logId;

    }


    protected function updateLogDataId($logDataId)
    {

        $update = new LogUpdate();
        $update->hasLogData = true;
        $update->logDataId = $logDataId;
        $update->updateById($this->getLogId());

        return $this;

    }


    protected function saveContentLog() {

        $data = new ContentLog();
        $data->updateOnDuplicate = true;
        $data->contentId = $this->contentType->getItem($this->dataId)->getContentId();
        $data->statusId = $this->status->id;
        $data->dateTimeCreated = (new DateTime())->setNow();
        $data->save();

        return $this;

    }

}