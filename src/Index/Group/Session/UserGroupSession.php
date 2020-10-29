<?php


namespace Nemundo\Content\Index\Group\Session;


use Nemundo\Content\Index\Group\User\UserContentType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\User\Type\UserSessionType;

class UserGroupSession extends AbstractBase
{

    public function getGroupId()
    {

        $groupId = (new UserContentType((new UserSessionType())->userId))->getGroupId();
        return $groupId;

    }

}