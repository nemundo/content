<?php

namespace Nemundo\Content\Index\Workflow\Type;


use Nemundo\Content\Type\AbstractContentType;
use Nemundo\Core\Base\AbstractBase;
use Nemundo\Core\Date\DateTimeDifference;
use Nemundo\Core\Type\DateTime\Date;
use Nemundo\Core\Type\DateTime\DateTime;
use Nemundo\Db\Sql\Order\SortOrder;
use Nemundo\Html\Container\AbstractContainer;
use Nemundo\Html\Container\AbstractHtmlContainer;
use Nemundo\Html\Paragraph\Paragraph;
use Nemundo\Model\Count\ModelDataCount;
use Nemundo\Model\Data\ModelUpdate;
use Nemundo\Model\Value\ModelDataValue;


abstract class AbstractProcess extends AbstractBase
{

    /*use GroupRestrictedTrait;
    use TaskIndexTrait;
    use DocumentIndexTrait;
    use CalendarIndexTrait;
    use FavoriteIndexTrait;
    use NotificationTrait;*/


    public $id;

    public $process;


    abstract protected function loadProcess();


    public function __construct()
    {

        $this->loadProcess();

    }

}