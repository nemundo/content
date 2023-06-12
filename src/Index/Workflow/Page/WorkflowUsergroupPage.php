<?php

namespace Nemundo\Content\Index\Workflow\Page;

use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Usergroup\Form\UsergroupAdminAddUserForm;
use Nemundo\Admin\Usergroup\Parameter\UsergroupParameter;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Index\Workflow\Com\Tab\WorkflowTab;
use Nemundo\Core\Directory\TextDirectory;
use Nemundo\User\Data\UserUsergroup\UserUsergroupReader;

class WorkflowUsergroupPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new WorkflowTab($layout);

        $usergroupId = (new UsergroupParameter())->getValue();

        $table = new AdminTable($layout);

        $userUsergroupReader = new UserUsergroupReader();
        $userUsergroupReader->model->loadUser();
        $userUsergroupReader->model->loadUsergroup();
        $userUsergroupReader->filter->andEqual($userUsergroupReader->model->usergroupId, $usergroupId);

        $header = new AdminTableHeader($table);
        $header->addText($userUsergroupReader->model->user->label);

        //$usergroup = new TextDirectory();
        foreach ($userUsergroupReader->getData() as $userUsergroupRow) {
            //$usergroup->addValue($userUsergroupRow->usergroup->usergroup);

            $row = new AdminTableRow($table);
            $row->addText($userUsergroupRow->user->login);
            $row->addText($userUsergroupRow->user->displayName);

        }

        // add user

        /*$form = new UsergroupAdminAddUserForm($layout);
        $form->*/



        return parent::getContent();
    }
}