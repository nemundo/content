<?php

namespace Nemundo\Content\Index\Log\Type;

use Nemundo\Content\Index\Log\Data\Log\Log;
use Nemundo\Content\Index\Log\Data\Log\LogUpdate;
use Nemundo\Content\Index\Log\Status\ActiveStatus;
use Nemundo\Content\Type\AbstractContentBuilder;
use Nemundo\Core\Debug\Debug;


// AbstractContentLogBuilder
abstract class AbstractLogContentBuilder extends AbstractContentBuilder
{

    private $logId;

    public function buildContent()
    {


        //$this->addAction(new LogIndexContentAction());

        $create = false;
        if ($this->dataId === null) {
            $create = true;
        }

        $data = new Log();
        //$data->contentId = $this->contentType->getItem($dataId)->getContentId();
        //$data->message = 'Log Message';
        $data->create = $create;

        if ($this->dataId === null) {
            $data->statusChange = true;
            $data->statusId = (new ActiveStatus())->id;
        } else {
            $data->statusChange = false;
        }

        $this->logId = $data->save();
        

        $dataId = parent::buildContent();

        $update = new LogUpdate();
        $update->contentId = $this->contentType->getItem($dataId)->getContentId();
        $update->updateById($this->getLogId());

        return $dataId;

    }



    protected function getLogId() {

        return $this->logId;

    }


    protected function updateLogDataId($logDataId) {

        $update = new LogUpdate();
        $update->hasLogData = true;
        $update->logDataId = $logDataId;
        $update->updateById($this->getLogId());

       /* (new Debug())->write($logDataId.' - '.$this->getLogId());
        exit;*/

        return $this;

    }



    //protected function saveLog($contentId)
    //{

    // create
    // modified

    /*protected function saveLog($message = null)
    {

        /*  $data = new Log();
          $data->poiId = $this->dataId;
          $data->dateTime = (new DateTime())->setNow();
          $data->message = $message;
          $data->contentId = $this->contentType->getItem($this->dataId)->getContentId();  // buildContent()
          $data->dataId = $this->dataId;
          $data->contentTypeId = $this->contentType->typeId;
          $logId = $data->save();

          return $logId;

      }*/


        /*    $data = new Log();
            $data->contentId =  $this->contentType->getItem($this->dataId)->getContentId();
            $data->message = $message;
            //$data->contentItemId = $this->itemContentId;
            $this->dataId = $data->save();*/


    //}

}