<?php


namespace Nemundo\Content\Index\Tree\Site;


use Nemundo\Content\Index\Tree\Data\Tree\TreeUpdate;
use Nemundo\Package\JqueryUi\Sortable\AbstractSortableSite;

class ContentSortableSite extends AbstractSortableSite
{

    /**
     * @var ContentSortableSite
     */
    public static $site;

    protected function loadSite()
    {

        ContentSortableSite::$site = $this;

    }


    public function loadContent()
    {

        $itemOrder = 0;
        foreach ($this->getItemOrderList() as $value) {

            $update = new TreeUpdate();
            $update->itemOrder = $itemOrder;
            $update->updateById($value);
            //$update->filter->andEqual($update->model->childId, $value);
            //$update->update();
            $itemOrder++;

        }

    }

}