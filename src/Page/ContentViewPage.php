<?php


namespace Nemundo\Content\Page;


use Nemundo\Admin\Com\Widget\AdminWidget;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Action\AbstractContentAction;
use Nemundo\Content\Com\Widget\ContentWidget;
use Nemundo\Content\Data\ContentAction\ContentActionReader;
use Nemundo\Content\Parameter\ContentParameter;
use Nemundo\Package\Bootstrap\Layout\BootstrapTwoColumnLayout;

class ContentViewPage extends AbstractTemplateDocument
{

    public function getContent()
    {


        $layout = new BootstrapTwoColumnLayout($this);


        $contentType = (new ContentParameter())->getContentType(false);

        //$contentReader = new ContentReader();
        //$contentReader->model->loadUser();
        //$contentRow = $contentReader->getRowById($contentType->getContentId());

        //$title = new AdminTitle($this);
        //$title->content = $contentType->getSubject();

//        $view = new ContentViewListBox($layout->col1);
//        $view->contentType = $contentType;

        $widget = new ContentWidget($layout->col1);
        $widget->contentType = $contentType;


        $reader = new ContentActionReader();
        $reader->model->loadContentType();
        $reader->addOrder($reader->model->contentType->contentType);

        // sort nach action label

        foreach ($reader->getData() as $actionRow) {
            //$this->addContentAction($actionRow->contentType->getContentType());

            /** @var AbstractContentAction $actionContentType */
            $actionContentType = $actionRow->contentType->getContentType();

            if ($actionContentType->hasView()) {

                $actionContentType->actionContentId = $contentType->getContentId();

                $widget = new AdminWidget($layout->col2);
                $widget->widgetTitle = $actionContentType->typeLabel;

                $actionContentType->getDefaultView($widget);

            }

        }

        return parent::getContent();

    }

}