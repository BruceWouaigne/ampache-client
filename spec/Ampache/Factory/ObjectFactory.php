<?php

namespace spec\Ampache\Factory;

use PHPSpec2\ObjectBehavior;

class ObjectFactory extends ObjectBehavior
{
    function it_should_be_initializable()
    {
        $this->shouldHaveType('Ampache\Factory\ObjectFactory');
    }

    function its_build_should_throw_an_exception_if_factory_does_not_exists()
    {
        $xml = new \SimpleXmlElement('<root><fake></fake></root>');
        $ex  = new \Exception('Factory \'\Ampache\Factory\FakeFactory\' does not exists');

        $this->shouldThrow($ex)->duringBuild(ANY_ARGUMENT, $xml);
    }

    function its_build_should_return_array_when_action_is_plural()
    {
        $xml = new \SimpleXmlElement('<root><artist></artist></root>');
        $this->build('artists', $xml)->shouldReturn(array('a'));
    }
}
