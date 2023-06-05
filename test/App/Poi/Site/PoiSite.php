<?php
namespace Nemundo\ContentTest\App\Poi\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\ContentTest\App\Poi\Page\PoiPage;
class PoiSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Poi';
$this->url = 'poi';
}
public function loadContent() {
(new PoiPage())->render();
}
}