<?php


namespace Nemundo\Content\Com\Container;


use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Content\Index\Tree\Type\AbstractTreeContentType;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Package\Bootstrap\Tabs\Panel\BootstrapTabsPanel;
use Nemundo\Package\Bootstrap\Tabs\Panel\BootstrapTabsPanelContainer;
use Nemundo\Web\Site\AbstractSite;

class ContentTypeFormContainer extends AbstractHtmlContainer
{

    /**
     * @var AbstractTreeContentType
     */
    public $contentType;

    /**
     * @var AbstractSite
     */
    public $redirectSite;

    public function getContent()
    {

        $subtitle = new AdminSubtitle($this);
        $subtitle->content = $this->contentType->typeLabel;

        $tab = new BootstrapTabsPanel($this);

        $count = 0;
        foreach ($this->contentType->getFormList() as $form) {

            $panel = new BootstrapTabsPanelContainer($tab);
            $panel->panelTitle = $form->formName;  // 'New';

            if ($count == 0) {
                $panel->active = true;
            }
            $count++;

            $panel->addContainer($form);

            //$form = $this->contentType->getDefaultForm($panel);
            $form->redirectSite = $this->redirectSite;

            /*$p = new Paragraph($panel);
            $p->content = $form->formName;*/

        }


        /*
        if ($this->contentType->hasForm()) {

            $panel = new BootstrapTabsPanelContainer($tab);
            $panel->panelTitle = 'New';
            $panel->active = true;

            $form = $this->contentType->getDefaultForm($panel);
            $form->redirectSite = $this->redirectSite;

        }*/


        /*if ($this->contentType->hasSearchForm()) {

            $panel = new BootstrapTabsPanelContainer($tab);
            $panel->panelTitle = 'Search';

            if (!$this->contentType->hasForm()) {
                $panel->active = true;
            }

            $form = $this->contentType->getSearchForm($panel);
            $form->redirectSite = $this->redirectSite;

        }*/

        return parent::getContent();

    }

}