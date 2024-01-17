<?phpnamespace Nemundo\Content\Index\Geo\Install;use Nemundo\App\Application\Setup\ApplicationSetup;use Nemundo\App\Application\Type\Install\AbstractInstall;use Nemundo\App\Scheduler\Setup\SchedulerSetup;use Nemundo\App\Script\Setup\ScriptSetup;use Nemundo\App\WebService\Setup\ServiceRequestSetup;use Nemundo\App\WebService\Setup\WebServiceSetup;use Nemundo\Content\Action\Setup\ActionSetup;use Nemundo\Content\Data\ContentType\ContentTypeReader;use Nemundo\Content\Index\Geo\Action\GeoIndexContentAction;use Nemundo\Content\Index\Geo\Action\KmlContentAction;use Nemundo\Content\Index\Geo\Application\GeoIndexApplication;use Nemundo\Content\Index\Geo\Data\GeoModelCollection;use Nemundo\Content\Index\Geo\Scheduler\GeoDistanceScheduler;use Nemundo\Content\Index\Geo\Script\GeoIndexCleanScript;use Nemundo\Content\Index\Geo\Script\GeoIndexRepairScript;use Nemundo\Content\Index\Geo\Script\GeoIndexUpdateScript;use Nemundo\Content\Index\Geo\Service\GeoContentTypeListService;use Nemundo\Content\Index\Geo\Service\GeoIndexListService;use Nemundo\Content\Index\Geo\Service\GeoPostService;use Nemundo\Content\Index\Geo\Setup\GeoContentTypeSetup;use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;use Nemundo\Model\Setup\ModelCollectionSetup;class GeoIndexInstall extends AbstractInstall{    public function install()    {        (new ApplicationSetup())            ->addApplication(new GeoIndexApplication());        (new GeoIndexApplication())->setAppMenuActive();        (new ModelCollectionSetup())            ->addCollection(new GeoModelCollection());        (new ScriptSetup(new GeoIndexApplication()))            ->addScript(new GeoIndexUpdateScript())            ->addScript(new GeoIndexRepairScript())            ->addScript(new GeoIndexCleanScript());        (new SchedulerSetup(new GeoIndexApplication()))            ->addScheduler(new GeoDistanceScheduler());        (new ActionSetup())            ->addContentAction(new GeoIndexContentAction());        //->addContentAction(new KmlAction());        /*(new WebServiceSetup(new GeoIndexApplication()))            ->addService(new GeoContentTypeListService())            ->addService(new GeoPostService())            ->addService(new GeoIndexListService());*/        /*$reader = new ContentTypeReader();        foreach ($reader->getData() as $contentTypeRow) {            $contentType = $contentTypeRow->getContentType();            if ($contentType->isObjectOfTrait(GeoIndexTrait::class)) {                (new GeoContentTypeSetup())                    ->addContentType($contentType);            }        }*/    }}