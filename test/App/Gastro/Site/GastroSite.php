<?php
namespace Nemundo\ContentTest\App\Gastro\Site;
use Nemundo\Web\Site\AbstractSite;
use Nemundo\ContentTest\App\Gastro\Page\GastroPage;
class GastroSite extends AbstractSite {
protected function loadSite() {
$this->title = 'Gastro';
$this->url = 'gastro';
}
public function loadContent() {
(new GastroPage())->render();
}
}