<?php


namespace Nemundo\Content\Parameter;


class ParentParameter extends AbstractContentUrlParameter
{

    protected function loadParameter()
    {
        $this->parameterName = 'parent';
    }

}