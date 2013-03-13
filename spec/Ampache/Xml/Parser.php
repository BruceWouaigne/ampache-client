<?php

namespace spec\Ampache\Xml;

use PHPSpec2\ObjectBehavior;

class Parser extends ObjectBehavior
{
    function it_should_be_initializable()
    {
        $this->shouldHaveType('Ampache\Xml\Parser');
    }

    function its_parse_should_return_SimpleXmlElement()
    {
        $this->parse(ANY_ARGUMENT)->shouldReturnAnInstanceOf('\SimpleXmlElement');
    }
}
