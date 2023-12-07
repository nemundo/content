<?php

namespace Nemundo\ContentTest\App\Poi\Content\TestPoi;

use Nemundo\Admin\Com\Table\AdminLabelValueTable;
use Nemundo\Content\Index\Log\View\AbstractContentLogView;
use Nemundo\ContentTest\App\Poi\Data\PoiLog\PoiLogReader;

class TestPoiLogView extends AbstractContentLogView
{


    public function getContent()
    {

        $poiLogRow = (new PoiLogReader())->getRowById($this->logDataId);

        $table = new AdminLabelValueTable($this);


        if ($poiLogRow->poiHasChanged) {

            /*$subtitle = new AdminSubtitle($this);
            $subtitle->content = 'Change Poi';

            $p = new Paragraph($this);
            $p->content = $poiLogRow->poiOld . ' --> ' . $poiLogRow->poiNew;*/

            $changeText = $poiLogRow->poiOld . ' -> ' . $poiLogRow->poiNew;
            $table->addLabelValue('Poi', $changeText);

        }


        if ($poiLogRow->descriptionHasChanged) {

            /*$subtitle = new AdminSubtitle($this);
            $subtitle->content = 'Change Description';

            $p = new Paragraph($this);
            $p->content = $poiLogRow->descriptionOld . ' --> ' . $poiLogRow->descriptionNew;*/

            $changeText = $poiLogRow->descriptionOld . ' -> ' . $poiLogRow->descriptionNew;
            $table->addLabelValue('Description', $changeText);

        }


        return parent::getContent();

    }


}