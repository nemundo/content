<?php


namespace Nemundo\Content\Type;

use Nemundo\Content\Index\Tree\Type\AbstractParentContentList;
use Nemundo\Content\View\AbstractContentAdmin;
use Nemundo\Core\Language\Translation;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Paragraph\Paragraph;


abstract class AbstractContentType extends AbstractType
{

    use ContentIndexTrait;
    use JsonTrait;


    /**
     * @var string
     */
    protected $listClass;

    /**
     * @var string
     */
    protected $adminClass;


    public function __construct($dataId = null)
    {

        parent::__construct($dataId);

        /*if ($this->formClass == null) {
            $this->formClass = ContentForm::class;
        }*/

        $this->loadUserDateTime();

    }


    public function saveType()
    {

        $this->saveData();
        $this->saveContent();
        $this->saveIndex();

    }


    public function getSubject()
    {

        $subject = '[No Content Type]';

        if ($this->typeLabel !== null) {
            $subject = (new Translation())->getText($this->typeLabel);
        }

        return $subject;

    }


    public function hasList()
    {

        $value = false;
        if ($this->listClass !== null) {
            $value = true;
        }

        return $value;

    }

    public function getList(AbstractContainer $parent)
    {

        /*$list = null;

        if ($this->listClass == null) {

            $list = new Paragraph($parent);
            $list->content = '[No List Object]';


        } else {*/

            /** @var AbstractParentContentList $list */
            $list = new $this->listClass($parent);
            $list->contentType=$this;
            //$list->parentId=

        //}

        return $list;

    }


    public function hasAdmin()
    {

        return $this->hasProperty($this->adminClass);

    }


    public function getAdmin(AbstractContainer $parent)
    {

        $admin = null;
        if ($this->hasAdmin()) {

            /** @var AbstractContentAdmin $admin */
            $admin = new $this->adminClass($parent);
            $admin->contentType = $this;


        } else {
            (new LogMessage())->writeError('No Admin Class. Class: ' . $this->getClassName());
        }

        return $admin;

    }


    private function hasProperty($class)
    {

        $value = false;
        if ($class !== null) {
            $value = true;
        }

        return $value;

    }


    public function getDataReader()
    {
        (new LogMessage())->writeError('getDataReader not defined');
    }


    public function deleteType()
    {

        parent::deleteType();
        $this->deleteContent();

    }

}