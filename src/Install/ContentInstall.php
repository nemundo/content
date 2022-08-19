<?phpnamespace Nemundo\Content\Install;use Nemundo\App\Application\Setup\ApplicationSetup;use Nemundo\App\Application\Type\Install\AbstractInstall;use Nemundo\App\Script\Setup\ScriptSetup;use Nemundo\App\WebService\Application\WebServiceApplication;use Nemundo\App\WebService\Setup\ServiceRequestSetup;use Nemundo\Content\Action\DeleteContentAction;use Nemundo\Content\Action\EditContentAction;use Nemundo\Content\Action\Setup\ActionSetup;use Nemundo\Content\Action\ViewContentAction;use Nemundo\Content\Application\ContentApplication;use Nemundo\Content\Data\ContentModelCollection;use Nemundo\Content\Index\Search\Application\SearchIndexApplication;use Nemundo\Content\Index\Tree\Application\TreeIndexApplication;use Nemundo\Content\Script\ContentCheckScript;use Nemundo\Content\Script\ContentCleanScript;use Nemundo\Content\Script\ContentTestScript;use Nemundo\Content\Script\ContentUpdateScript;use Nemundo\Content\Script\ReIndexScript;use Nemundo\Content\Service\ContentActionListService;use Nemundo\Content\Service\ContentDeleteService;use Nemundo\Content\Service\ContentGroupService;use Nemundo\Content\Service\ContentJsonServiceRequest;use Nemundo\Content\Service\ContentSearchService;use Nemundo\Content\Service\ContentTypeListService;use Nemundo\Content\Service\DataContentJsonService;use Nemundo\Content\Type\Index\ContentIndexContentAction;use Nemundo\Model\Setup\ModelCollectionSetup;class ContentInstall extends AbstractInstall{    public function install()    {        (new ModelCollectionSetup())            ->addCollection(new ContentModelCollection());        (new ScriptSetup(new ContentApplication()))            ->addScript(new ReIndexScript())            ->addScript(new ContentUpdateScript())            ->addScript(new ContentTestScript())            ->addScript(new ContentCheckScript());        (new ActionSetup())            ->addContentAction(new ContentIndexContentAction())            ->addContentAction(new DeleteContentAction())            ->addContentAction(new EditContentAction())            ->addContentAction(new ViewContentAction());        (new WebServiceApplication())->installApp();        (new ServiceRequestSetup(new ContentApplication()))            ->addService(new ContentActionListService())            ->addService(new DataContentJsonService())            ->addService(new ContentDeleteService())            ->addService(new ContentTypeListService())            ->addService(new ContentSearchService())            ->addService(new ContentGroupService())            /*->addServiceRequest(new ContentSearchService())            ->addServiceRequest(new ContentSearchCountService())*/            ->addService(new ContentJsonServiceRequest());    }}