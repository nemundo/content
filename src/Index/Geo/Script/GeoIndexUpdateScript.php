<?phpnamespace Nemundo\Content\Index\Geo\Script;use Nemundo\App\Script\Type\AbstractConsoleScript;use Nemundo\Content\Data\ContentType\ContentTypeReader;use Nemundo\Content\Index\Geo\Index\GeoIndexContentTypeUpdate;use Nemundo\Content\Index\Geo\Setup\GeoContentTypeSetup;use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;class GeoIndexUpdateScript extends AbstractConsoleScript{    protected function loadScript()    {        $this->scriptName = 'geoindex-update';    }    public function run()    {        (new GeoIndexContentTypeUpdate())->updateContentType();        /*$reader = new ContentTypeReader();        foreach ($reader->getData() as $contentTypeRow) {            $contentType = $contentTypeRow->getContentType();            $item = $contentType->getItem(0);            if ($item->isObjectOfTrait(GeoIndexTrait::class)) {                (new GeoContentTypeSetup())                    ->addContentType($contentType);            }        }*/    }}