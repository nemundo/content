<?php

namespace Nemundo\Content\Index\Log\Type;

use Nemundo\Admin\ActionSite\ActiveActionSite;
use Nemundo\Admin\ActionSite\IconActionSite;
use Nemundo\Admin\ActionSite\InactiveActionSite;
use Nemundo\Admin\Com\Table\AdminTable;
use Nemundo\Admin\Com\Table\AdminTableHeader;
use Nemundo\Admin\Com\Table\Row\AdminTableRow;
use Nemundo\Admin\Com\Title\AdminSubtitle;
use Nemundo\Content\Index\Log\Com\Table\LogTable;
use Nemundo\Content\Index\Log\Data\Log\Log;
use Nemundo\Content\Index\Log\Data\Log\LogReader;
use Nemundo\Content\Index\Log\Status\ActiveStatus;
use Nemundo\Content\Index\Log\Status\DeleteStatus;
use Nemundo\Content\Parameter\DataIdParameter;
use Nemundo\Content\View\AbstractContentAdmin;
use Nemundo\Core\Http\Url\UrlReferer;
use Nemundo\Core\Language\LanguageCode;


// AbstractContentLogAdmin
class AbstractLogContentAdmin extends AbstractContentAdmin
{

    /**
     * @var IconActionSite
     */
    protected $log;

    protected function loadActionSite()
    {

        parent::loadActionSite();

        $this->log = new IconActionSite($this);
        $this->log->title[LanguageCode::EN] = 'Log';
        $this->log->title[LanguageCode::DE] = 'Log';
        $this->log->actionName = 'log';
        $this->log->iconName = 'clock-rotate-left';

        $this->log->onAction = function () {

            $dataId = (new DataIdParameter())->getValue();

            $subtitle = new AdminSubtitle($this);
            $subtitle->content = 'Log/History';

            $table = new LogTable($this);
            $table->contentTypeId = $this->contentType->typeId;
            $table->dataId = $dataId;

/*
            $table = new AdminTable($this);

            $logReader = new LogReader();
            $logReader->model->loadContent()->loadStatus();
            $logReader->model->content->loadContentType();
            $logReader->model->loadUser();
            //$logReader->addOrder($logReader->model->id, SortOrder::DESCENDING);
            $logReader->addOrder($logReader->model->id);

            $logReader->filter->andEqual($logReader->model->content->dataId, $dataId);

            $header = new AdminTableHeader($table);
            //$header->addText($logReader->model->message->label);
            $header->addText($logReader->model->user->label);
            $header->addText($logReader->model->dateTime->label);
            $header->addText($logReader->model->create->label);
            $header->addText($logReader->model->statusChange->label);
            $header->addText($logReader->model->status->label);
            $header->addText($logReader->model->hasLogData->label);
            $header->addText($logReader->model->logDataId->label);
            // $header->addEmpty();

            foreach ($logReader->getData() as $logRow) {

                $tableRow = new AdminTableRow($table);
                //$tableRow->addText($logRow->content->contentType->contentType);
                //$tableRow->addText($logRow->message);
                $tableRow->addText($logRow->user->displayName);
                $tableRow->addText($logRow->dateTime->getShortDateTimeLeadingZeroFormat());
                $tableRow->addYesNo($logRow->create);

                $tableRow->addYesNo($logRow->statusChange);
                $tableRow->addText($logRow->status->status);
                $tableRow->addYesNo($logRow->hasLogData);
                $tableRow->addText($logRow->logDataId);

                if ($logRow->hasLogData) {

                    /** @var AbstractLogContentType $contentType */
              /*      $contentType = $logRow->content->contentType->getContentType();

                    if ($contentType->hasLogView()) {
                        $view = $contentType->getLogView($tableRow);
                        $view->logDataId = $logRow->logDataId;
                    } else {
                        $tableRow->addText('no log view'); // addEmpty();
                    }

                } else {
                    $tableRow->addEmpty();
                }


            }*/

        };



        $this->active = new ActiveActionSite($this);
        $this->active->onAction = function () {

            $dataId = (new DataIdParameter())->getValue();
            $this->onActive($dataId);
            $this->saveActive($dataId);

            (new UrlReferer())->redirect();

        };


        $this->inactive = new InactiveActionSite($this);
        $this->inactive->onAction = function () {

            $dataId = (new DataIdParameter())->getValue();
            $this->onInactive($dataId);
            $this->saveInactive($dataId);

            (new UrlReferer())->redirect();

        };





    }


    protected function getLogSite($dataId)
    {

        $site = clone($this->log);
        $site->addParameter(new DataIdParameter($dataId));
        return $site;

    }


    protected function saveActive($dataId)
    {

        $data = new Log();
        $data->contentId = $this->contentType->getItem($dataId)->getContentId();
        $data->statusChange = true;
        $data->statusId = (new ActiveStatus())->id;
        $data->logDataId = false;
        $data->save();

    }


    protected function saveInactive($dataId)
    {

        $data = new Log();
        $data->contentId = $this->contentType->getItem($dataId)->getContentId();
        $data->statusChange = true;
        $data->statusId = (new DeleteStatus())->id;
        $data->logDataId = false;
        $data->save();

    }

}