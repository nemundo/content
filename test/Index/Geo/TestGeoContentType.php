<?phpnamespace Nemundo\ContentTest\Index\Geo;use Nemundo\Content\Index\Geo\Type\GeoIndexTrait;use Nemundo\Content\Type\AbstractContentType;class TestGeoContentType extends AbstractContentType{    use GeoIndexTrait;    protected function loadContentType()    {        $this->typeLabel='Test Geo Content Type';        $this->typeId='b49a53e2-fb1c-4556-b4ff-46494082775b';        // TODO: Implement loadContentType() method.    }    protected function onCreate()    {        parent::onCreate(); // TODO: Change the autogenerated stub    }    public function getCoordinate(){    // TODO: Implement getCoordinate() method.}}