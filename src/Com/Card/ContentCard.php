<?php

namespace Nemundo\Content\Com\Card;

use Nemundo\Admin\Com\Card\AdminCard;
use Nemundo\Content\Builder\ContentBuilder;

class ContentCard extends AdminCard
{

    public $contentId;

    //public $content;

    public function getContent()
    {

        /*if ($this->content === null) {
            $this->content = (new ContentBuilder())->getContent($this->contentId);
        }*/

        $builder = new ContentBuilder($this->contentId);
        $item = $builder->getContentItem();

        $this->cardTitle = $item->getSubject();


        //$this->content->getDefaultView($this);

        $view = $builder->getDefaultView($this);

        return parent::getContent();

    }

}