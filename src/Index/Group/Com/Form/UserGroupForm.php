<?php


namespace Nemundo\Content\Index\Group\Com\Form;


use Nemundo\Package\Bootstrap\Form\BootstrapForm;
use Nemundo\Content\Index\Group\Com\ListBox\GroupListBox;
use Nemundo\Content\Index\Group\Com\ListBox\GroupTypeListBox;
use Nemundo\Content\Index\Group\Data\GroupUser\GroupUser;
use Nemundo\Content\Index\Group\Type\GroupContentType;
use Nemundo\User\Com\ListBox\UserListBox;

class UserGroupForm extends BootstrapForm
{

    public $userId;

    /**
     * @var GroupTypeListBox
     */
    private $group;

    public function getContent()
    {

        $this->group=new GroupListBox($this);
        $this->group->submitOnChange=true;

        $this->submitButton->visible=false;

        return parent::getContent();
    }


    protected function onSubmit()
    {

        /*
        $type = new GroupContentType();
        $type->fromGroupId($this->group->getValue());
        $type->addUser($this->userId);*/


        //$type = new GroupContentType($this->group->getValue());
        //$type->fromGroupId($this->group->getValue());
        //$type->addUser($this->userId);

        $data = new GroupUser();
        $data->ignoreIfExists = true;
        $data->groupId = $this->group->getValue();
        $data->userId = $this->userId;
        $data->save();



    }

}