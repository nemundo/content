<?php


namespace Nemundo\Content\Form;


use Nemundo\Abrechnung\Content\Abrechnung\AbrechnungContentType;
use Nemundo\Admin\Com\Form\AbstractAdminForm;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Content\Index\Tree\Writer\TreeWriter;
use Nemundo\Content\Type\EventTrait;
use Nemundo\Core\Debug\Debug;


// AbstractTreeContentForm
abstract class AbstractContentSearchForm extends AbstractAdminForm
{

    use EventTrait;

    //use ContentFormTrait;


    /**
     * @var AbstractTreeContentType
     */
    public $contentType;



    public function getContent()
    {

        $this->submitButton->label='Add';

        return parent::getContent();

    }


    protected function saveTree(AbstractTreeContentType $contentType) {

        //if ($this->contentType->hasParent()) {

            $writer = new TreeWriter();
            $writer->parentId = $this->contentType->getParentId();
            $writer->childId = $contentType->getContentId();
            $writer->write();

            foreach ($this->contentType->getEventList() as $event) {
                $event->onCreate($contentType);
            }

        //}


    }


}