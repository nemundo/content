<?phpnamespace Nemundo\Content\Index\Search\Service;use Nemundo\App\WebService\Service\AbstractServiceRequest;use Nemundo\Content\Index\Search\Data\Word\WordReader;use Nemundo\Core\Http\Request\HttpRequest;class WordService extends AbstractServiceRequest{    protected function loadService()    {        $this->serviceName = 'search-word';    }    public function onRequest()    {        $wordReader = new WordReader();        $wordReader->filter->andContainsLeft($wordReader->model->word, (new HttpRequest('word'))->getValue());        $wordReader->addOrder($wordReader->model->word);        $wordReader->limit = 10;        foreach ($wordReader->getData() as $wordRow) {            $row = [];            $row['word'] = $wordRow->word;            $this->addRow($row);        }    }}