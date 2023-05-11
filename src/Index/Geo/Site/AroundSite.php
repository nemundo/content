<?phpnamespace Nemundo\Content\Index\Geo\Site;use Nemundo\Content\Index\Geo\Page\AroundPage;use Nemundo\Content\Index\Geo\Parameter\GeoCoordinateParameter;use Nemundo\Content\Index\Geo\Site\Kml\AroundKmlSite;use Nemundo\Web\Site\AbstractSite;class AroundSite extends AbstractSite{    /**     * @var AroundSite     */    public static $site;    protected function loadSite()    {        $this->title = 'Around';        $this->url = 'around';        AroundSite::$site = $this;        new AroundKmlSite($this);    }    public function loadContent()    {        $parameter = new GeoCoordinateParameter();        if ($parameter->hasValue()) {            (new AroundPage())->render();        } else {            $site = clone(AroundSite::$site);            $site->addParameter(new GeoCoordinateParameter('46.8735590368648, 8.635687309394777'));            $site->redirect();        }    }}