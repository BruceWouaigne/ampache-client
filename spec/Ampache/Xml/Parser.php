<?php

namespace spec\Ampache\Xml;

use PHPSpec2\ObjectBehavior;

class Parser extends ObjectBehavior
{
    function its_parse_should_return_SimpleXmlElement()
    {
        $this->parse(ANY_ARGUMENT)->shouldReturnAnInstanceOf('\SimpleXmlElement');
    }
}
