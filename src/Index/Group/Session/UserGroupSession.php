<?php


namespace Nemundo\Content\Index\Group\Session;


use Nemundo\Content\Index\Group\Data\Group\GroupId;
use Nemundo\Content\Index\Group\Data\GroupUser\GroupUserId;
use Nemundo\Content\Index\Group\User\UserContentType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\User\Type\UserSessionType;

class UserGroupSession extends AbstractBase
{

    public function getGroupId()
    {

        //(new UserSessionType())->userId;

        $id = new GroupUserId();
        $id->filter->andEqual($id->model->userId,(new UserSessionType())->userId);
        $id->filter->andEqual($id->model->userId,(new UserSessionType())->userId);


        $id->filter->andEqual($id->model->contentId, $this->getContentId());
        //$id->filter->andEqual($id->model->contentId, $this->getDataId());
        $id = $id->getId();



        $groupId = (new UserContentType((new UserSessionType())->userId))->getGroupId();
        return $groupId;

    }

}