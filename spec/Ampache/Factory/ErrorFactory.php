<?php

namespace spec\Ampache\Factory;

use PHPSpec2\ObjectBehavior;

class ErrorFactory extends ObjectBehavior
{
    function it_should_be_initializable()
    {
        $this->shouldHaveType('Ampache\Factory\ErrorFactory');
    }

    function its_hydrateObject_should_throw_an_exception()
    {
        $ex = new \Ampache\Exception\AmpacheException('error');
        $xml = new \SimpleXmlElement('<root>error</root>');

        $this->shouldThrow($ex)->duringHydrateObject($xml);
    }
}
