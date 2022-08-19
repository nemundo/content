<?php

namespace Nemundo\Content\Action\Com\Container;

use Nemundo\Admin\Com\Card\AdminCard;
use Nemundo\Admin\Com\Layout\AdminFlexboxLayout;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Content\Data\ContentAction\ContentActionReader;
use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Debug\Debug;
use Nemundo\Html\Block\Div;

class ContentActionContainer extends AdminFlexboxLayout
{

    /**
     * @var AbstractContentType
     */
    //public $content;


    public $contentId;

    public function getContent()
    {

        $contentActionReader = new ContentActionReader();
        foreach ($contentActionReader->getData() as $contentActionRow) {

            $action = $contentActionRow->getAction();

            //(new Debug())->write($action);

            if ($action->hasView()) {

                //$widget = new AdminWidget($this);
                //$widget->widgetTitle= $contentActionRow->action;

                $card=new AdminCard($this);
                $card->cardTitle= $contentActionRow->action;

                /*$subtitle = new AdminSubtitle($this);
                $subtitle->content = $contentActionRow->action;*/

                $view = $action->getView($card);
                $view->contentId = $this->contentId;


                /*if ($action->hasForm()) {
                    $form=$action->getForm($this);
                    $form->content = $this->content;
                }*/

            }

        }

        return parent::getContent();
    }

}