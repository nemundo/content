<?php

namespace Nemundo\Content\Page;

use Nemundo\Com\Template\AbstractTemplateDocument;
use Nemundo\Content\Builder\ContentTypeBuilder;
use Nemundo\Html\Paragraph\Paragraph;

class ContentAdminItemPage extends AbstractTemplateDocument
{

    public $contentTypeId;

    public function getContent()
    {

        /*$p=new Paragraph($this);
        $p->content='content type: '.$this->contentTypeId;*/

        $builder = new ContentTypeBuilder();
        $contentType = $builder->getContentType($this->contentTypeId);

        $contentType->getAdmin($this);

        return parent::getContent();


    }

}