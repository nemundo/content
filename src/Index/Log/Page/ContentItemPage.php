<?php

namespace Nemundo\Content\Index\Log\Page;

use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Title\AdminTitle;
use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Index\Log\Com\Tab\LogTab;
use Nemundo\Content\Parameter\ContentParameter;

class ContentItemPage extends AbstractTemplateDocument
{
    public function getContent()
    {

        $layout = new AdminFlexboxLayout($this);
        new LogTab($layout);

        $item = (new ContentParameter())->getContentItem();

        $title = new AdminTitle($layout);
        $title->content = $item->getSubject();

        $view = (new ContentParameter())->getContent()->getDefaultView($layout);
        $view->dataId = $item->getDataId();


        return parent::getContent();
    }
}