<?php

namespace Nemundo\Content\Builder;

use Nemundo\Content\Data\ContentAction\ContentActionReader;
use Nemundo\Content\Type\AbstractContentItem;
use Nemundo\Content\Type\Index\ContentIndexContentAction;
use Nemundo\Core\Base\AbstractBase;

// ActionBuilder
// ContentIndexBuilder
class IndexBuilder extends AbstractBase
{

    public function buildIndex(AbstractContentItem $item)
    {

        (new ContentIndexContentAction())->onAction($item);

        $reader = new ContentActionReader();
        foreach ($reader->getData() as $actionCustomRow) {
            $action = $actionCustomRow->getAction();
            $action->onAction($item);
        }

    }


    public function deleteIndex(AbstractContentItem $item)
    {

        $reader = new ContentActionReader();
        foreach ($reader->getData() as $actionCustomRow) {
            $action = $actionCustomRow->getAction();
            $action->deleteAction($item);
        }

    }

}