<?php


namespace Nemundo\Content\Com\Container;


use Nemundo\Html\Block\Div;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Process\Workflow\Content\Status\AbstractProcessStatus;

// ContentChildContainer
class ContentChildContainer extends AbstractHtmlContainer
{

    /**
     * @var AbstractTreeContentType
     */
    public $contentType;

    public function getContent()
    {

        foreach ($this->contentType->getChild() as $contentRow) {


            $contentType = $contentRow->getContentType();

            if ($contentType->hasView()) {

                $div = new Div($this);
                if ($contentType->hasView()) {
                    $view = $contentType->getDefaultView($div);
                    //$view->dataId = $contentRow->dataId;
                }

            }

        }

        return parent::getContent();

    }

}