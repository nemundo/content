<?php


namespace Nemundo\Content\Type;

use Nemundo\Content\View\AbstractContentAdmin;
use Nemundo\Content\View\AbstractContentList;
use Nemundo\Core\Language\Translation;
use Nemundo\Core\Log\LogMessage;
use Nemundo\Html\Container\AbstractContainer;


abstract class AbstractContentType extends AbstractType
{

    use ContentIndexTrait;


    // $listingClass

    /**
     * @var string
     */
    protected $listClass;

    /**
     * @var string
     */
    protected $adminClass;


    public function saveType()
    {

        $this->saveData();
        $this->saveContent();
        $this->saveContentIndex();
        $this->saveIndex();

        $this->runEvent();

    }


    public function getSubject()
    {

        $subject = '[No Content Type]';

        if ($this->typeLabel !== null) {
            $subject = (new Translation())->getText($this->typeLabel);
        }

        return $subject;

    }


    public function getText()
    {

        $text = '';
        return $text;

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

        /** @var AbstractContentList $list */
        $list = new $this->listClass($parent);
        $list->contentType = $this;

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