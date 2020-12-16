<?php


namespace Nemundo\Content\Type;


use Nemundo\Content\Data\Content\Content;
use Nemundo\Content\Data\Content\ContentCount;
use Nemundo\Content\Data\Content\ContentDelete;
use Nemundo\Content\Data\Content\ContentId;
use Nemundo\Content\Data\Content\ContentUpdate;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\User\Session\UserSession;
use Nemundo\User\Type\UserSessionType;

trait ContentIndexTrait
{

    abstract public function getSubject();


    /**
     * @var DateTime
     */
    //public $dateTime;

    /**
     * @var string
     */
    //public $toId;


    protected $contentId;


    protected function loadUserDateTime()
    {

        /*
        $this->dateTime = (new DateTime())->setNow();

        if ((new UserSession())->isUserLogged()) {
            $this->toId = (new UserSession())->userId;
        } else {
            $this->toId = '';
        }*/

    }


    public function getContentId()
    {

        if ($this->contentId == null) {

            if ($this->existContent()) {

                $id = new ContentId();
                $id->filter->andEqual($id->model->contentTypeId, $this->typeId);
                $id->filter->andEqual($id->model->dataId, $this->getDataId());
                $this->contentId = $id->getId();
            }

        }

        return $this->contentId;

    }


    public function existContent()
    {

        $value = true;

        $count = new ContentCount();
        $count->filter->andEqual($count->model->contentTypeId, $this->typeId);
        $count->filter->andEqual($count->model->dataId, $this->dataId);
        if ($count->getCount() == 0) {
            $value = false;
        }

        return $value;

    }


    protected function saveContent()
    {

        //$this->dateTime = (new DateTime())->setNow();

        $userId = null;
        if ((new UserSession())->isUserLogged()) {
            $userId  = (new UserSession())->userId;
        } /*else {
            $this->toId = '';
        }*/


        $data = new Content();
        $data->ignoreIfExists = true;
        $data->contentTypeId = $this->typeId;
        $data->dataId = $this->getDataId();
        $data->dateTime = (new DateTime())->setNow();  //$this->dateTime;
        $data->userId =$userId;  // $this->toId;
        $data->save();

    }


    protected function updateContent()
    {

        $data = new Content();
        $data->updateOnDuplicate = true;
        $data->contentTypeId = $this->typeId;
        $data->dataId = $this->getDataId();
        $data->dateTime = $this->dateTime;
        $data->userId = $this->toId;
        $data->save();

    }


    protected function saveContentIndex()
    {

        $update = new ContentUpdate();
        $update->subject = $this->getSubject();
        $update->updateById($this->getContentId());

    }


    protected function deleteContent()
    {

        (new ContentDelete())->deleteById($this->getContentId());


    }


}